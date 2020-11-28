<!-- 'hollname' '	chierno' '	color' 'description''rate''price' 'stats' -->
<!-- Display All Sections -->
<table class="table table-hover table-bordered SectionTable">
    <tr class="danger">
        <th>رقم اللوحة</th>
        <th>اسم السائق</th>
        <th>نوع السياره </th>
        <th> حالة السيارة </th>
        <th>   بلون السيارة </th>
        <th> عمليات </th>
    </tr>
    <?php
    for ($i=0;$i<count($SecDataDiespaly);$i++)
    {
        echo "<tr>
                <td>  {$SecDataDiespaly[$i]['SID']} </td>
                <td>  {$SecDataDiespaly[$i]['SName']} </td>
                <td>  {$SecDataDiespaly[$i]['Stype']} </td>
                <td>  {$SecDataDiespaly[$i]['SStatus']} </td>
                <td>  {$SecDataDiespaly[$i]['howuse']} </td>
                <td>
                    <a href='?page=asamda&action=delete&id={$SecDataDiespaly[$i]['SID']}'><img class='imeg' src='resource/images/delete.png'></a>
                    <a href='?page=asamda&action=edit&id={$SecDataDiespaly[$i]['SID']}'><img class='imeg' src='resource/images/edit.png'></a>
                </td>
             </tr>";
    }
    ?>
    
</table>
