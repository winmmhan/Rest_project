<?php
require_once("newconfig.php");

class Database{
    
    public $connection;
    
    function __construct(){
        $this->open_db_connection();
    }
    
    public function open_db_connection(){
        
        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); 
        
        if(mysqli_connect_errno()){
            die(); 
        }
    } 
    
    public function query($sql){
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
    }
    
    
    private function confirm_query($result){
        if(!result){
            die("Query Failed");
        }
    }
    
    
    public function escape_string($string){
        
        $escape_string =mysqli_real_escape_string($this->connection, $string);
        
        return $escape_string;
    }
    
}

$database = new Database();
?>