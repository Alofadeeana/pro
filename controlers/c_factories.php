<h3>الشركات</h3>
<!-- add new Hall -->
<h2><a href="?page=factories&action=add">اضافه شركه جديده</a></h2>

<?php
if($_POST or @$_GET['action'])
{
    if(isset($_GET['action']) and $_GET['action']=="add")
    {
        include 'veiws/v_addFactory.php';
    }
    if(isset($_POST['submit']) && $_POST['submit']=="Add")
    {
        $newSEcData['FName'] = $_POST['FName'];
        $newSEcData['FAddress'] = $_POST['FAddress'];
        $tablename="factories";
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
            $tablename="factories";
            $DeleteSection=new delete($tablename);
            $DataDelete=$DeleteSection->deleteRecordById($id,'FID');
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
        $tablename="factories";
        $editSection=new Display($tablename);
        $recordData=$editSection->getRecordById($id,'FID');
        $editSection->close();
        include 'veiws/v_editFactory.php';
    }
    //Edit
    if(isset($_POST['submit']) && $_POST['submit']=="Edit")
    {
        $SecDataEdit['FName'] = $_POST['FName'];
        $SecDataEdit['FAddress'] = $_POST['FAddress'];
        try 
        {
           $tablename="factories";    
            $id=$_GET['id'];
            $SecUpdate=new update($SecDataEdit,$tablename);
            $SecDataDiespaly=$SecUpdate->editdata($id,'FID');
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
    $tablename="factories";
    $DiespalySection=new Display($tablename);
    $SecDataDiespaly=$DiespalySection->getAllData();
    include 'veiws/v_factories.php';
}
?>