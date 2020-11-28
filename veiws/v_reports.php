
<form class="MainSettingForm add" action="" method="post">
    <h1>اختر الشركة المطلوبة</h1>
    <label> الشركة :</label>
    <select name="FID">
    <?php
    foreach($factories as $row)
    {
        echo '<option value="'.$row['FID'].'">'.$row['FName'].'</option>';
    }
    ?>
    
    <input class="btn-primary btn-lg" type="submit" name="submit" value="بحث">
</form>