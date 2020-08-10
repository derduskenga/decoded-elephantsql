<?php
    include_once './util.php';	
    class DBConnector {
        var $pdo;
        function __construct(){
                $dsn= "pgsql:host=". Util::$SERVER_NAME . ";dbname=" . Util::$DB_NAME ."";
                $options = [ 
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => false,
                        //Notice here that we read data from tables and is presented as an associative array
                        //indexed by names of column
                        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
                        ];
                try{
                        $this->pdo = new PDO($dsn, Util::$DB_USER, Util::$DB_USER_PASS, $options);				
                }catch (PDOException $e){
                        echo $e->getMessage();
                }			
        }
        public function connectToDB(){
                return $this->pdo;
        } 			
        public function closeDB(){
                $this->pdo = null;
        }
    }
?>