<?php 
 session_start();
 $sid=$_SESSION['sid'];
if(empty($sid)){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Dashboard</title>
    <script>
        function imagecookie(){
            document.getElementById("image1").innerHTML="<?php echo $imagep;?>";
        }
    </script>
    <style>
        .navs{
            padding: 5px;
        }
        .ml{
            margin-left: 10px;
        }
        .br{
            border-right: 1px rgb(92, 96, 102) solid;
        }
        body{
            background-image: url("images/adminbg.jpg");
        }
        .content{
            width: 110%;
            height: 400px;
            background-color: rgb(50, 54, 59);
            border-radius: 10px;
            border:2px solid rgb(189, 197, 217);
            padding:50px;
            color: white;
        }
        .listbg{
            background-color: rgb(50, 54, 59);
            color: white;
        }
        #test{
            width: 300px;
            height: 300px;
            margin-left: 220px;
        }
        #name{
            text-align: center;
            margin-top: 100px;
        }
        #age{
            text-align: center;
            margin-top: 100px;
        }
        #gender{
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <header>
        <?php
            include "nav.php";
        ?>
    </header>
    <br><br>
    <section class="row container">
        <aside class="col-sm-3">
            <?php
                include "sidebar.php";
            ?>
        </aside>
        <aside class="col-sm-9">
            <div class="content">
                <?php 
                switch(@$_GET['con']){
                case 'image' : include("image.php");
                break;
                case 'changeimage' : include("changeimage.php");
                break;
                case 'name' : include("name.php");
                break;
                case 'age' : include("age.php");
                break;
                case 'gender' : include("gender.php");
                break;
                }
               ?>
            </div>
        </aside>
    </section>
</body>
</html>