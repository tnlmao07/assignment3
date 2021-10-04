<?php
$email=$_COOKIE['email'];
$error="";
if(isset($_POST['submit'])){
    $tmp=$_FILES['changeimage']['tmp_name'];
    $filename=$_FILES['changeimage']['name'];
    $ext=pathinfo($filename,PATHINFO_EXTENSION);
    $dest="users/$email/$email.$ext";
    if(is_dir("users/$email")){
        if(!empty($tmp)){
            if($ext=="jpg" || $ext=="png" || $ext=="jpeg"){
                $fo=fopen("users/$email/details.txt","r");
                $femail=trim(fgets($fo));
                $fpassword=trim(fgets($fo));
                $fname=trim(fgets($fo));
                $fage=trim(fgets($fo));
                $fgender=trim(fgets($fo));
                $ffilepath=trim(fgets($fo));
                fclose($fo);

                if(move_uploaded_file($tmp,$dest)){
                    $ffilepath=$dest;
                    file_put_contents("users/$email/details.txt","$femail\n$fpassword\n$fname\n$fage\n$fgender\n$ffilepath");
                    if($ext=="jpg"){
                        if(!empty("users/$email/$email.png")){
                            unlink("users/$email/$email.png");
                        }else if(!empty("users/$email/$email.jpeg")){
                            unlink("users/$email/$email.jpeg");
                        }
                    }else if($ext=="png"){
                        if(!empty("users/$email/$email.jpg")){
                            unlink("users/$email/$email.jpg");
                        }else if(!empty("users/$email/$email.jpeg")){
                            unlink("users/$email/$email.jpeg");
                        }
                    }else if($ext=="jpeg"){
                        if(!empty("users/$email/$email.jpg")){
                            unlink("users/$email/$email.jpg");
                        }else if(!empty("users/$email/$email.png")){
                            unlink("users/$email/$email.png");
                        }
                    }
                    session_start();
                    header('Location:dashboard.php');
                }else{
                    $error="Uploading error";
                }
                
            }else{
                $error="Only JPG,PNG,JPEG formats supported!";
            }
        }else{
            $error="Select a file";
        }
    }else{
        $error="No data found!";
    }
}
?>
<form method="post" enctype="multipart/form-data">
        <?php 
            if(!empty($error)){
        ?>
        <div style="margin-top: 40px;" class="alert alert-danger"> <?php echo $error;?></div>
        <?php
          }
        ?>
    <input type="file" name="changeimage"><br>
    <input type="submit" name="submit">
        
</form>