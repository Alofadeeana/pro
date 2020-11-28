<!-- 'hollname' '	chierno' '	color' 'description''rate''price' 'stats' -->
<!-- Display All Sections -->
<table class="table table-hover table-bordered SectionTable">
    <tr class="danger">
        <th>رقم الشركه</th>
        <th>اسم الشركة</th>
        <th> عنوان الشركة </th>
        <th> عمليات </th>
    </tr>
    <?php
    for ($i=0;$i<count($SecDataDiespaly);$i++)
    {
        echo "<tr>
                <td>  {$SecDataDiespaly[$i]['FID']} </td>
                <td>  {$SecDataDiespaly[$i]['FName']} </td>
                <td>  {$SecDataDiespaly[$i]['FAddress']} </td>
                <td>
                    <a href='?page=factories&action=delete&id={$SecDataDiespaly[$i]['FID']}'><img class='imeg' src='resource/images/delete.png'></a>
                    <a href='?page=factories&action=edit&id={$SecDataDiespaly[$i]['FID']}'><img class='imeg' src='resource/images/edit.png'></a>
                </td>
             </tr>";
    }
    ?>
    
</table>
