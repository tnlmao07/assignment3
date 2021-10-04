<?php
$email=$_COOKIE['email'];
if(is_dir("users/$email/")){
    $fo=fopen("users/$email/details.txt","r");
    $femail=trim(fgets($fo));
    $fpassword=trim(fgets($fo));
    $fname=trim(fgets($fo));
    $fgender=trim(fgets($fo));
    $fage=trim(fgets($fo));
    $ffilepath=trim(fgets($fo));
    fclose($fo);
    $gender1=$fgender;
}?>
<p id="gender">Registered Gender Is : <b><?php echo $gender1;?></b></p>