<?php
$tablename="factories";
$DiespalySection=new Display($tablename);
$factories=$DiespalySection->getAllData();
$tablename="samad";
$DiespalySection=new Display($tablename);
$samad=$DiespalySection->getAllData();
?>
<form class="MainSettingForm add" action="" method="post">
    <h1> بيانات الطلب</h1>
    <label> رقم الطلب :</label>
    <input type="text" disabled value="<?php echo $recordData['FOID']; ?>" >
    <label> المصنع :</label>
    <select name="FID">
    <?php
    foreach($factories as $row)
    {
      if($row['FID'] == $recordData['FID'])
            echo '<option value="'.$row['FID'].'" selected>'.$row['FName'].'</option>';
        else
            echo '<option value="'.$row['FID'].'">'.$row['FName'].'</option>';
    }
    ?>
    </select>
    <label> السماد :</label>
    <select name="SID">
    <?php
    foreach($samad as $row)
    {
      if($row['SID'] == $recordData['SID'])
        echo '<option value="'.$row['SID'].'" selected>'.$row['SName'].'</option>';
      else
        echo '<option value="'.$row['SID'].'">'.$row['SName'].'</option>';
    }
    ?>
    </select>
    <label> تاريخ الانتاج :</label>
    <input type="text"  name="Oder_date" value="<?php echo $recordData['Oder_date']; ?>" >
    <label> تاريخ الطلب :</label>
    <input type="text"  name="production_date" value="<?php echo $recordData['production_date']; ?>" >

    <h1> الموافقة</h1>
    <label> الموافقة :</label>
    <?php
    if($recordData['assent'] == null)
    echo '<select name="assent">
    <option value="1">موافقة</option>
    <option value="2">مخالفة</option>
  <select>';
  elseif($recordData['assent'] == 1)
    echo '<select name="assent">
     <option value="1" selected>موافقة</option>
      <option value="2">مخالفة</option>
    <select>';
else
  echo '<select name="assent">
    <option value="1">موافقة</option>
    <option value="2" selected>مخالفة</option>
  <select>';
  ?>
    <label> ملاحظة :</label>
    <input type="text" name="note" value="<?php echo $recordData['note']; ?>" >
      <input type="hidden" name="id" value="<?php echo $recordData['FOID']; ?>">
      <input class="btn-primary btn-lg" type="submit" name="submit" value="Edit">
  
</form>