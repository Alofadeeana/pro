<?php

/*
 * Description of delete class
 *
 * @author Mohmmed
 */
class delete extends bank
{
    private $tablename;
    public function __construct($tablename) 
    {
        $this->tablename=$tablename;
        $this->connectToDB();
    }
    function deleteRecordById($id,$colume = 'id')
    {
        $id=  intval($id);
        $sql=" DELETE FROM $this->tablename WHERE $colume=$id";
        $query=$this->cxn->cxn->prepare($sql);
        if( $query->execute()) return TRUE;
        else 
        {   
            throw new Exception("Error : can not deleted");
            return false;
        }   
    }
    function deleteRecordBycolume($id,$colume="id")
    {
        $id=  intval($id);
        echo $sql=" DELETE FROM $this->tablename WHERE $colume=$id";
        $query=$this->cxn->cxn->prepare($sql);
        if( $query->execute()) return TRUE;
        else 
        {   
            throw new Exception("Error : can not deleted");
            return false;
        }   
    }
}
?>
