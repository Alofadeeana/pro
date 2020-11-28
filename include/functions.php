<?php
//include the init file
/* Display the Main site info */
try 
{//`id`, `site_name`, `site_url`, `site_dcsc`, `site_email`, `site_tags`,, `fb`, `tw`, `rss`, `yt`, `username`
    $data= new Display("main_settings");
    $siteInfo=$data->getLastRecordDESC();
}
catch (Exception $ex) 
{
    $ex->getMessage();
}
    

?>