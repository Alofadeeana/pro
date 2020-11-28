<?php
class database 
{
    private $host;
    private $user;
    private $password;
    private $database;
    public $cxn;
            function __construct($filename) {
       IF( is_file($filename)) include $filename;
       else throw new Exception("Error Not connected");
       
       $this->host=$host;
       $this->user=$user;
       $this->password=$password;
       $this->database=$database;
       $this->connect();
    }
    private function connect()
    {
        //connect server
		//$this->cxn = new PDO(PDO_DSN,$this->user,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES UTF8"));
		$this->cxn = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8",$this->user, $this->password);
        //$this->cxn = NEW PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password, 
         //       array(PDO::ATTR_ERRMODE=>  PDO::ERRMODE_EXCEPTION));   
    }
    function close()
    {
        unset($this->cxn);
        $this->cxn=NULL;
    }
}
