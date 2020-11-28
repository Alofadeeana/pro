
<form class="MainSettingForm add" action="" method="post">
    <h1>تعديل بيانات شركة</h1>
    <label> اسم الشركة:</label>
    <input type="text" name="FName" value="<?php echo $recordData['FName']; ?>" >
    <label> عنوان الشركة :</label>
    <input type="text" name="FAddress" value="<?php echo $recordData['FAddress']; ?>" >
      <input type="hidden" name="id" value="<?php echo $recordData['FID']; ?>">
    <input class="btn-primary btn-lg" type="submit" name="submit" value="Edit">
</form>