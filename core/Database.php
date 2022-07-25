<?php
    class Database{
        const HOST_NAME = 'localhost';
        const USER_NAME = 'root';
        const PASSWORD = '';
        const DB_NAME = 'webquanao';

        private $connection;
        
        public function connection(){
            $this->connection = mysqli_connect(self::HOST_NAME, self::USER_NAME, self::PASSWORD, self::DB_NAME);
            mysqli_set_charset($this->connection, 'utf8');
            if(!$this->connection){
                die("Connection failed: " . mysqli_connect_error());
            }
            return $this->connection;
        }
    }
?>