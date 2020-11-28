<h3>السيارات</h3>
<!-- add new Hall -->
<h2><a href="?page=asamda&action=add">اضافة سيارة جديدة</a></h2>

<?php
if($_POST or @$_GET['action'])
{
    if(isset($_GET['action']) and $_GET['action']=="add")
    {
        include 'veiws/v_addsamad.php';
    }
    if(isset($_POST['submit']) && $_POST['submit']=="Add")
    {
        $newSEcData['SName'] = $_POST['SName'];
        $newSEcData['Stype'] = $_POST['Stype'];
        $newSEcData['SStatus'] = $_POST['SStatus'];
        $newSEcData['howuse'] = $_POST['howuse'];
        $tablename="samad";
        try 
        {
            $addNewSEc=new add($newSEcData,$tablename);
            if($addNewSEc)
            {
                echo '<script type="text/javascript">
                 alert("تم الحفظ");history.go(-2)</script>';
            }
            
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    //delete
    if(isset($_GET['action']) and $_GET['action']=="delete")
    {
        try 
        {
            $id=$_GET['id'];
            $tablename="samad";
            $DeleteSection=new delete($tablename);
            $DataDelete=$DeleteSection->deleteRecordById($id,'SID');
            if($DataDelete)
            {
                echo '<script type="text/javascript">
                 alert("تم الحذف");history.go(-1)</script>';
            }
        } catch (Exception $ex) 
        {
            $ex->getMessage();
        }
    }
    //Edit view
    if(isset($_GET['action']) and $_GET['action']=="edit")
    {
        $id=$_GET['id'];
        $tablename="samad";
        $editSection=new Display($tablename);
        $recordData=$editSection->getRecordById($id,'SID');
        $editSection->close();
        include 'veiws/v_editsamad.php';
    }
    //Edit
    if(isset($_POST['submit']) && $_POST['submit']=="Edit")
    {
        $SecDataEdit['SName'] = $_POST['SName'];
        $SecDataEdit['Stype'] = $_POST['Stype'];
        $SecDataEdit['SStatus'] = $_POST['SStatus'];
        $SecDataEdit['howuse'] = $_POST['howuse'];
        try 
        {
           $tablename="samad";    
            $id=$_GET['id'];
            $SecUpdate=new update($SecDataEdit,$tablename);
            $SecDataDiespaly=$SecUpdate->editdata($id,'SID');
            $SecUpdate->close(); 
            if($SecDataDiespaly)
            {
                echo '<script type="text/javascript">
                 alert("تم التعديل");history.go(-1)</script>';
            }
        } catch (Exception $ex) 
        {
            $ex->getMessage();
        }
    }
}
 else 
{
    $tablename="samad";
    $DiespalySection=new Display($tablename);
    $SecDataDiespaly=$DiespalySection->getAllData();
    include 'veiws/v_asamda.php';
}
?>