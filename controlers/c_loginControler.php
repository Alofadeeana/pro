<?php
if($_POST or @$_GET)
{
    if(isset($_GET['info']) and $_GET['info']=='log')
    {
        header('Location:loginControler.php');
        session_destroy();
    }
    if(isset($_GET['info']) and $_GET['info']=='info')
    {
        $username=  $_SESSION['username'];
        $tablename="users";
        $Diespaly=new Display($tablename);
        $recordData=$Diespaly->getRecordById($username,"username");
        require_once 'veiws/v_info.php';
    }
    if(isset($_POST['submit']) and $_POST['submit']=="Edit")
    {
        $valid=new validator();
        $data['name'] = $_POST['name'];
        $data['email'] = $valid->sanitizeItrm($_POST['email'],"email");
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        try 
        {
            
            $rules=array(
                "name"=>"checkRequied|checkString",
                "email"=>"checkRequied|checkEmail",
                "username"=>"checkRequied|checkString",
                "password"=>"checkRequied"
            );
            if(!$valid->validate($data, $rules))
            {
                echo 'error';
            die();}
        } catch (Exception $ex) {
            $ex->getMessage();
            die();
        }
        try 
        {
            $updateUser= new update($data, $tablename);
                $updatedData=$updateUser->editdatabycolome($_SESSION['username'],"username");
                if($updatedData)
                {
                    echo '<script type="text/javascript">alert("THE Student is Updeted");history.go(-1)</script>';
                }
        } catch (Exception $ex) 
        {
            $ex->getMessage();
        }
    }
}
?>