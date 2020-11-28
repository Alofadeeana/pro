<?php

/*
 * Display to get reqwested data from database
 *
 * @author Mohmmed
 */
class Display extends bank {
    private $tablename;
    private $recData;
    public function __construct($tablename) {
        $this->tablename=$tablename;
        $this->connectToDB();
    }
    function getAllData()
    {
        $sql="SELECT * FROM $this->tablename ORDER BY 'id' ASC";
        $query=$this->cxn->cxn->prepare($sql);
        $query->execute();
        $data=$query->fetchAll();
        return @$data;
    }
    function getLastRecordDESC()
    {
        $sql="SELECT * FROM $this->tablename ORDER BY id DESC LIMIT 1";
        $query=$this->cxn->cxn->prepare($sql);
        $query->execute();
        $data=$query->fetch();
        return $data;
    }
    function getRecordById($id,$colume="id")
    {
        //$id=  intval($id);
        $sql="SELECT * FROM $this->tablename WHERE $colume='$id'";
        $query=$this->cxn->cxn->prepare($sql);
        $query->execute();
        $this->recData=$query->fetch();
        return $this->recData;
    }
    function getAllDataById($id,$colume="id")
    {
       // $id=  intval($id);
        $sql="SELECT * FROM $this->tablename WHERE $colume=$id order by 'id' ASC";
        $query=$this->cxn->cxn->prepare($sql);
        $query->execute();
        $data=$query->fetchAll();
        return $data;
    }
    function getAllAccById($id,$colume="id",$start,$end)
    {
       // $id=  intval($id);
        $sql="SELECT * FROM $this->tablename WHERE $colume=$id and date>='$start' and date<='$end' order by 'id' ASC";
        $query=$this->cxn->cxn->prepare($sql);
        $query->execute();
        $data=$query->fetchAll();
        return $data;
    }
}
