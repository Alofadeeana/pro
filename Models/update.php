<?php

/*
 * 
 * Description of update class
 *
 * @author Mohmmed
 */
class update extends bank
{
    private $tablename;
    private $data;
    public function __construct($data,$tablename) 
    {
        if(is_array($data))
        {
            $this->data=$data;
            
        }
        $this->tablename=$tablename;
        $this->connectToDB();
    }
    function editdata($id,$items='id')
    {
       $id=  intval($id);
       $sql="UPDATE $this->tablename SET ";
       foreach ($this->data as $key=>$value) 
       {
           $val[]=$key."=:".$key."";
       }
       $sql.=implode($val, ",");
        $sql.=" WHERE $items=$id";
       $query=$this->cxn->cxn->prepare($sql);
        foreach ($this->data as $key=>$value)
        {
            $query->bindparam(":$key",  $this->data[$key], PDO::PARAM_STR);
        }
        if( $query->execute()) return TRUE;
        else 
        {   
            throw new Exception("Error : can not excute the query");
            return false;
        }
    }
      function editdatabycolome($id,$colome="id")
    {
       $id=  intval($id);
       $sql="UPDATE $this->tablename SET ";
       foreach ($this->data as $key=>$value) 
       {
           $val[]=$key."=:".$key."";
       }
       $sql.=implode($val, ",");
        $sql.=" WHERE $colome=$id";
       $query=$this->cxn->cxn->prepare($sql);
        foreach ($this->data as $key=>$value)
        {
            $query->bindparam(":$key",  $this->data[$key], PDO::PARAM_STR);
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