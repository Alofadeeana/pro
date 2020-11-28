<?php

/*
 * add class
 * insert into mysql database
 *
 * @author Mohmmed
 */
class add extends bank
{
    private $data;
    private $tablename;
    public function __construct($data,$tablename) 
    {
        if(is_array($data))
        {
            $this->data=$data;
            $this->tablename=$tablename;
        }
        else 
        {
            throw new Exception("Error the data must be in an array");
        }
        
        $this->connectToDB();
        
        //insert the Data into the table
        $this->addData($this->data);
        
    }
    private function addData($data)
    {
        foreach ($data as $key => $value) {
            $keys[]=$key;
            $values[]=$value;
        }
        $tblKeys=implode($keys, ",");
        $Keyss=":".implode($keys, ",:");
        $sql="INSERT INTO $this->tablename ($tblKeys) VALUES ($Keyss)";
        $query=$this->cxn->cxn->prepare($sql);
        foreach ($keys as $key)
        {
            $query->bindparam(":$key",$data[$key], PDO::PARAM_STR);
        }
        if( $query->execute()) return TRUE;
        else 
        {   
            throw new Exception("Error : can not excute the query");
            return false;
        }
    }
}
?>
