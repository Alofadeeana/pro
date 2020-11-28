<?php

/*
 * main class will include the main functions
 * @author Mohmmed
 */
class bank 
{
    protected $cxn;
    function connectToDB()
   {
       require_once  Models.'database.php';
       $vars="include/vars.php";
       $this->cxn= new database($vars);
   } 
   function close()
   {
       $this->cxn->close();
   }
}
?>
