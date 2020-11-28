<!-- 'hollname' '	chierno' '	color' 'description''rate''price' 'stats' -->
<!-- Display All Sections -->
<table class="table table-hover table-bordered SectionTable">
    <tr class="danger">
        <th> رقم الطلب</th>
        <th> الشركة</th>
        <th> السيارات</th>
        <th> تاريخ الحجز </th>
        <th> تاريخ انتهاء الحجز </th>
        <th> ملاحظة </th>
        <th> الموافقة </th>
        <th> عمليات </th>
    </tr>
    <?php
    for ($i=0;$i<count($SecDataDiespaly);$i++)
    {
        echo "<tr>
                <td>  {$SecDataDiespaly[$i]['FOID']} </td>";
                $id=$SecDataDiespaly[$i]['FID'];
                $tablename="factories";
                $editSection=new Display($tablename);
                $recordData=$editSection->getRecordById($id,'FID');
                echo "<td>{$recordData['FName']} </td>";
                $id=$SecDataDiespaly[$i]['SID'];
                $tablename="samad";
                $editSection=new Display($tablename);
                $recordData=$editSection->getRecordById($id,'SID');
                echo "<td>{$recordData['SName']} </td>
                <td>  {$SecDataDiespaly[$i]['Oder_date']} </td>
                <td>  {$SecDataDiespaly[$i]['production_date']} </td>
                <td>  {$SecDataDiespaly[$i]['note']} </td>";
                if($SecDataDiespaly[$i]['assent'] == null)
                    echo "<td>  
                    <a class='btn btn-primary btn-sm' href='?page=reports&action=view&id={$SecDataDiespaly[$i]['FOID']}'>موافقة</a>
                    </td>";
                     elseif($SecDataDiespaly[$i]['assent'] == 1)
                     {
                        
                     echo "<td>  
                        تمت الموافقة
                     </td>";
                     }
                     else
                     echo "<td>  
                         مخالف للمواصفات
                    </td>";
                    if($_SESSION['username']=='admin')
                echo "<td>
                    <a href='?page=reports&action=delete&id={$SecDataDiespaly[$i]['FOID']}'><img class='imeg' src='resource/images/delete.png'></a>
                    <a href='?page=reports&action=edit&id={$SecDataDiespaly[$i]['FOID']}'><img class='imeg' src='resource/images/edit.png'></a>
                </td>
             </tr>";
             else
                echo "<td></td>";
    }
    ?>
    
</table>
