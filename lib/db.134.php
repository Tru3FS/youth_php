<?php


    //디버그모드:토큰체크여부 (처음API인증은 제외)
    $IsTokenCheck = false;
	static $manage_gs_key = 'fK#h19qaZ$5djs,<';

    //----------------------------------------------------------
    //지점접속-DB
    //----------------------------------------------------------
    class db{

        //Properties
        private $dbhost = '10.70.4.71:3306';
        private $dbuser = 'gymus_asp';        
        private $dbpass = '1234%^&*gymus';  
        private $dbname = 'scms_youtho'; //134
 
        //Connect
        public function connect($DB_Info){

			global $IsTokenCheck;

            //----------------------------------------
            //$DB_Info에 DB_Name + DB_IP가 넘어오는 것을 분리!
            $DB_Info = explode('<*>', $DB_Info);
            $DB_Name = $DB_Info[0];
            $DB_IP = $DB_Info[1];
            //----------------------------------------

			if ($IsTokenCheck == True) 
               $mysql_connect_str = "mysql:host=".$DB_IP.";dbname=".$DB_Name;
            else
               $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";

            $dbConnection = new PDO($mysql_connect_str , $this->dbuser , $this->dbpass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
     }




?>