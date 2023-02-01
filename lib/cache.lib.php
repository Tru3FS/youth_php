<?php
if (!defined('_SAMSUNG_')) exit;

include_once(dirname(__FILE__) .'/Cache/obj.class.php');
include_once(dirname(__FILE__) .'/Cache/FileCache.class.php');

function get_cachemanage_instance(){
    static $instance = null;
    
    if( ! (defined('NC_USE_CACHE') && NC_USE_CACHE) ) return $instance;
    
    $instance = run_replace('get_cachemanage_instance', $instance);

    if( $instance === null ){
        $options = array(
            '_cache_path'=> NC_DATA_PATH.'/cache',
            'file_extension'=>'.php',
            );
        $instance = new FileCache($options);
    }

    return $instance;
}

function nc_cache_secret_key(){
    static $str = '';

    if( $str ) return $str;

    $str = substr(md5($_SERVER['SERVER_SOFTWARE'].$_SERVER['DOCUMENT_ROOT']), 0, 6);

    return $str;
}

function nc_latest_cache_data($bo_table, $cache_list=array(), $find_wr_id=0){
    static $cache = array();

    if( $bo_table && $cache_list && ! isset($cache[$bo_table]) ){
        foreach( (array) $cache_list as $wr ){
            if( empty($wr) || ! isset($wr['wr_id']) ) continue;
            $cache[$bo_table][$wr['wr_id']] = $wr;
        }
    }
    
    if( $find_wr_id && isset($cache[$bo_table][$find_wr_id]) ){
        return $cache[$bo_table][$find_wr_id];
    }
}

function nc_set_cache($key, $save_data, $ttl = null){

    if( $cache = get_cachemanage_instance() ){
        run_event('nc_set_cache_event', $cache, $key, $save_data, $ttl);
        
        if( (is_object($cache) && get_class($cache) === 'FileCache') ){
            $cache->save($key, $save_data, $ttl);
        }
    }
}

function nc_get_cache($key, $expired_time=0){

    if( $cache = get_cachemanage_instance() ){
        if( (is_object($cache) && get_class($cache) === 'FileCache') ){
            return $cache->get($key, $expired_time);
        }

        return run_replace('nc_get_cache_replace', false, $cache, $key, $expired_time);
    }
    
    return false;
}

function nc_delete_cache($key){
    if( $cache = get_cachemanage_instance() ){
        return $cache->delete($key);
    }
    
    return false;
}

function nc_delete_all_cache(){

    $board_tables = get_board_names();

    foreach( $board_tables as $board_table ){
        delete_cache_latest($board_table);
    }

    run_event('adm_cache_delete', $board_tables);

}

function nc_delete_cache_by_prefix($key){

    $cache = get_cachemanage_instance();
    $files = null;

    if( (is_object($cache) && get_class($cache) === 'FileCache') ) {
        $files = glob(NC_DATA_PATH.'/cache/'.$key.'*');

        foreach( (array) $files as $filename){
            if(empty($filename)) continue;

            unlink($filename);
        }
    }

    $files = run_replace('nc_delete_cache_by_prefix', $files, $key, $cache);

    return ($files) ? true : false;
}