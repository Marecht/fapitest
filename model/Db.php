<?php
    abstract class Db{
        
        protected static $connection;
        

        function __construct(){
            try{
                self::$connection = new PDO("mysql:host=localhost;dbname=fapi_test;charset=utf8","root","");
            }
            catch(Exception $e){
                if(isset($e)){
                    self::$connection = new PDO("mysql:host=localhost;dbname=id21016207_fapi_test;charset=utf8",
                    "id21016207_marekklein",
                    "Qwerty123@");
                }
            }
            
        }

        public function getOne($sql, $params = array()){
            $rtrn = self::$connection->prepare($sql);
		    $rtrn->execute($params);
	        $rtrn = $rtrn->fetch();


            return $rtrn;
        }

        public function getAll($sql, $params = array()){
            $rtrn = self::$connection->prepare($sql);
		    $rtrn->execute();
	        $rtrn = $rtrn->fetchAll();



            return $rtrn;
        }

        public function execute($sql, $params = array()){
            $exec = self::$connection->prepare($sql);
		    $exec->execute($params);
        }

    }
?>