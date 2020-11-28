<?php   
if($_POST)
{
 //Register
    if(isset($_POST['submit']) and $_POST['submit']=="Register")
    {
            
            
            $datas['name'] = $_POST['name'];
            $datas['username'] = $_POST['username'];
            $datas['email'] = $_POST['email'];
            $datas['password'] = $_POST['password'];
             $x=new add($datas,'users');
             if($x)
                 echo "تم الحفظ";
                 else
                 echo "error";
    }
}
    else
        include './veiws/v_addUser.php';
    ?>