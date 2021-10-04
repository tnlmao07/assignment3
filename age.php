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
    $age1=$fage;
}
?>
<p id="age">Registered Age Is : <b><?php echo $age1;?></b></p>