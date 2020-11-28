
<?php
if($_POST or @$_GET['action'])
{
    if(isset($_GET['action']) && $_GET['action']== "add")
    {
        if(isset($_POST['submit']) && $_POST['submit'] =="Add")
        {
            $newPage['page_name'] = $_POST['page_name'];
            $newPage['page_content'] = $_POST['page_content'];
            $newPage['page_status'] = $_POST['page_status'];
            $newPage['page_date'] = $_POST['page_date'];
            $newPage['createdBy'] = $_SESSION['username'];
            $newPage['page_image']="";
            if(!empty($_FILES['page_image']['name'][0]))
            {
            try {
            $file = $_FILES['page_image'];
            $allowedExts = array('png', 'jpg','gif');
            $uploadsDirecotry = '../resource/uploads/';
            $maxSize = 4000000;
            $upload = new upload($file, $allowedExts, $uploadsDirecotry, $maxSize);
            $upload->uploadFiles();
            $newPage['page_image'] = $upload->getFileUrl();
            
        } catch (Exception $ex) {
            $ex->getMessage();
        }
            }
        else 
        {
            $newPage['page_image']='resources/images/logo.png';
        }
            $tablename="pages";
            try 
            {
                $addNewPage = new add($newPage, $tablename);
                if($addNewPage)
                {
                    echo '<script type="text/javascript">alert("THE new Page is added");history.go(-1)</script>';
                }
            } catch (Exception $ex) 
            {
                $ex->getMessage();
            }

        }
        else 
        {
           try 
            {
                $tablename="sections";
                $DisplaySection = new Display( $tablename);
                $PageDataDiespaly=$DisplaySection->getAllData();
            } 
            catch (Exception $ex) 
            {
                $ex->getMessage();
            }
            include 'veiws/v_addNewPage.php'; 
        }
        
    }
    
     //delete
    if(isset($_GET['action']) and $_GET['action']=="delete")
    {
        try 
        {
            $id=$_GET['id'];
            $tablename="pages";
            $DeleteSection=new delete($tablename);
            $DataDelete=$DeleteSection->deleteRecordById($id);
        } catch (Exception $ex) 
        {
            $ex->getMessage();
        }
    }
    
    //Edit
    if(isset($_GET['action']) and $_GET['action']=="edit")
    {
        
        $id=$_GET['id'];
        $tablename="pages";
        $editPage=new Display($tablename);
        $recordData=$editPage->getRecordById($id);
        include 'veiws/v_editPage.php';
        
        if(isset($_POST['submit']) and $_POST['submit']=="Edit")
        {
            $id=$_GET['id'];
            $editData['page_name'] = $_POST['page_name'];
            $editData['page_content'] = $_POST['page_content'];
            $editData['page_status'] = $_POST['page_status'];
            $editData['sectionId'] = $_POST['sectionName'];
            if(!empty($_FILES['page_image']['name'][0]))
            {
                try {
                $file = $_FILES['page_image'];
                $allowedExts = array('png', 'jpg','gif');
                $uploadsDirecotry = 'resources/uploads/';
                $maxSize = 4000000;
                $upload = new upload($file, $allowedExts, $uploadsDirecotry, $maxSize);
                $upload->uploadFiles();
                $editData['page_image'] = $uploadsDirecotry.$upload->getFileUrl();
                } catch (Exception $ex) {
                    $ex->getMessage();
                }
            }
            $tablename="pages";
            try 
            {
                $updatePage = new update($editData, $tablename);
                $updatedPage=$updatePage->editdata($id);
                if($updatedPage)
                {
                    echo '<script type="text/javascript">alert("THE posst is Updeted");history.go(-1)</script>';
                }
            } catch (Exception $ex) 
            {
                $ex->getMessage();
            }
        }
    }
}
 else 
{
    $tablename="pages";
    $DiespalyPage=new Display($tablename);
    $PageDataDiespaly=$DiespalyPage->getAllData();
    include 'veiws/v_main.php';
}

?>