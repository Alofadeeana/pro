<?php

/*
 * Login class

 */
class login extends bank{
    private $username;
    private $password;
    private $tname;
    private $item1;
    private $item2;
    private $sxn;//DB object
   function __construct($username,$password,$tname = "users",$item1 = "username",$item2 = "password") 
   {
      //set Data
       $this->setData($username,$password,$tname,$item1,$item2);
      //Get DB
       $this->connectToDB();
      //get Data
     
       //$this->close();
       
   }
   public function Data()
   {
        $data= $this->getData();
          return $data;
   }

   private function setData($username,$password,$tname,$item1,$item2)
   {
       $this->username=$username;
       $this->password=$password;
       $this->tname=$tname;
       $this->item1=$item1;
       $this->item2=$item2;
   }
   private function getData()
   {
       $sql = "select * from $this->tname where $this->item1='$this->username' AND $this->item2='$this->password'";
       $query=$this->cxn->cxn->prepare($sql);
         $query->execute();
          $data=$query->fetch();
          
        return $data;
   }
}
?>