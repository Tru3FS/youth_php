<?php


    //����׸��:��ūüũ���� (ó��API������ ����)
    $IsTokenCheck = false;
	static $manage_gs_key = 'fK#h19qaZ$5djs,<';

    //----------------------------------------------------------
    //��������-DB
    //----------------------------------------------------------
    class db{

        //Properties
        private $dbhost = '10.70.4.71:3306'; //'49.236.147.121';
		//private $dbhost = '112.217.123.82:13305';
        private $dbuser = 'gymus_asp';        
        private $dbpass = '1234%^&*gymus';  
        private $dbname = 'scms_youth_test';     //default
 
        //Connect
        public function connect($DB_Info){

			global $IsTokenCheck;

            //----------------------------------------
            //$DB_Info�� DB_Name + DB_IP�� �Ѿ���� ���� �и�!
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