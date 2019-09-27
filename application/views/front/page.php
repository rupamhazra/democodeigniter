<?php
//echo $banner;
//$str = str_replace("{{BASEURL}}", base_url(), stripslashes($banner));
$str =str_replace("{{BASEURL}}", base_url(), stripslashes($body));
$strAppend=str_replace("{{TOKEN}}",$this->security->get_csrf_token_name(), stripslashes($str));
$strFinal=str_replace("{{TOKENVALUE}}",$this->security->get_csrf_hash(), stripslashes($strAppend));
echo str_replace("{{BASEURL}}", base_url(), stripslashes($strFinal));
?>
