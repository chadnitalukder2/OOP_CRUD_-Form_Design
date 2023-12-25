<?php
    include_once '../config/config.php';

    class Databse{
        public $host      = HOST;
        public $user      = USER;
        public $password  = PASSWORD;
        public $database  = DATABASE;

        public $link;
        public $error;

        public function __construct()
        {
            $this->dbConnet();
        }

        public function dbConnet(){
                $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);

                if(!$this->link){
                        $this->error = "Database Connection Failed";
                        return false;
                }




            }


    }





?>