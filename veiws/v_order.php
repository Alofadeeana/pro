
<form class="MainSettingForm add" action="" method="post">
    <h1> بيانات الطلب</h1>
    <label> رقم الطلب :</label>
    <input type="text" disabled value="<?php echo $recordData['FOID']; ?>" >
    <label>  الشركة :</label>
    <?php
     $id=$recordData['FID'];
     $tablename="factories";
     $editSection=new Display($tablename);
     $Data=$editSection->getRecordById($id,'FID');?>


    <input type="text" disabled value="<?php echo $Data['FName']; ?>" >
    <label> السيارة :</label>
    <?php
     $id=$recordData['SID'];
     $tablename="samad";
     $editSection=new Display($tablename);
     $Data=$editSection->getRecordById($id,'SID');
     ?>
    <input type="text" disabled value="<?php echo $Data['SName']; ?>" >
    <label> تاريخ الحجز:</label>
    <input type="text" disabled value="<?php echo $recordData['Oder_date']; ?>" >
    <label> تاريخ انتهاء الرحلة :</label>
    <input type="text" disabled value="<?php echo $recordData['production_date']; ?>" >

    <h1> الموافقة</h1>
    <label> الموافقة :</label>
<select name="assent">
    <option value="1">موافقة</option>
    <option value="2">مخالفة</option>
  <select>

    <label> ملاحظة :</label>
    <input type="text" name="note" value="<?php echo $recordData['note']; ?>" >
      <input type="hidden" name="id" value="<?php echo $recordData['FOID']; ?>">
      <input class="btn-primary btn-lg" type="submit" name="submit" value="حفظ">
  
</form>