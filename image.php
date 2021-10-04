<?php
$email=$_COOKIE['email'];
if(is_dir("users/$email/")){
    $fo=fopen("users/$email/details.txt","r");
    $femail=trim(fgets($fo));
    $fpassword=trim(fgets($fo));
    $fname=trim(fgets($fo));
    $fage=trim(fgets($fo));
    $fgender=trim(fgets($fo));
    $ffilepath=trim(fgets($fo));
    fclose($fo);
    $test=$ffilepath;
}

?>

<div>
    <img src="<?php echo $test;?>" id="test" alt="No image found!!">
    <p id=""></p>
</div>