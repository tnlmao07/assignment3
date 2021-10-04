<?php
$error="";
if(isset($_POST['submit'])){
    $oldpass=$_POST['oldpassword'];
    $newpass=$_POST['newpassword'];
    $cpass=$_POST['confirmpassword'];
    $email=$_COOKIE['email'];
    $password=$_COOKIE['password'];
    /* $name=$_COOKIE['name'];
    $age=$_COOKIE['age'];
    $gender=$_COOKIE['gender']; */
    $filename="users/".$email."/details.txt";

    if(is_dir("users/".$email."/")){
        $fo=fopen($filename,"r");
        $femail=trim(fgets($fo));
        $fpassword=trim(fgets($fo));
        $fname=trim(fgets($fo));
        $fage=trim(fgets($fo));
        $fgender=trim(fgets($fo));
        $ffilepath=trim(fgets($fo));
        fclose($fo);
        if(!empty($oldpass)&& !empty($newpass)&& !empty($cpass)){
            if($oldpass==$fpassword){
                if($newpass==$cpass){   
                    $passwordv=input_field($_POST['newpassword']);
                    if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/",$passwordv)){
                        $error="Incorrect Password Format";
                    }else{
                        $fpassword=$newpass;
                        $fp = fopen($filename, "w");
                        file_put_contents("users/$email/details.txt","$femail\n $fpassword\n $fname\n $fage\n $fgender\n $ffilepath");
                        fclose($fp);
                        session_start();
                        setcookie("password","",time()-3600,"/");
                        header('Location:login.php');
                    }
                }else{
                    $error="New Password not Matching!";
                }
            }else{
                $error="Incorrect Old Password!";
            }
        }else{
            $error="Fill in the fields";
        }
    }
}
function input_field($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Change Password</title>
    <style>
        .main{
            background-color: rgb(45, 48, 59);
            padding: 20px;
            margin: 25px;
            border-radius: 15px;
            color:white;
            border:2px solid rgb(189, 197, 217);
        }
        body{
            margin-left: 300px;
            margin-right: 300px;
            background-image: url("images/adminbg.jpg");
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="main">
        <?php 
            if(!empty($error)){
        ?>
        <div style="margin-top: 40px;" class="alert alert-danger"> <?php echo $error;?></div>
        <?php
          }
        ?>
        <form method="post" enctype="multipart/form-data">
        <h2 style="font-size:28px;color:rgb(39, 45, 61);text-align:center; background-color:rgb(189, 197, 217);
        padding:5px;border-radius:10px">Change Password</h2>
            <div class="form-group">
                <label for="password">Old Password: </label>
                <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Old Password">
            </div><br>
            <div class="form-group">
                <label for="password">New Password: </label>
                <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="New Password">
            </div><br>
            <div class="form-group">
                <label for="password">Confirm Password: </label>
                <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="Confirm Password">
            </div><br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>	&nbsp;	&nbsp;	&nbsp;
        </form>
    </div>
    
</body>
</html>