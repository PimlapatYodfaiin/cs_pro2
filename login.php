<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="assets/libs/css/stylelogin.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include "page/dbconnect.php";

   
    if (isset($_GET['user_name'])) {
         $user_name = $_GET['user_name'];
         $pass_word = md5($_GET['pass_word']);        
        if ($user_name != '' && $pass_word != '') {            
            $select_user = "SELECT  * FROM users WHERE user_username = '$user_name' && user_pass = '$pass_word'";            
            $query_user = mysqli_query($connect, $select_user);            
            if (mysqli_num_rows($query_user) != '0') {
                $res_user = mysqli_fetch_array($query_user);
                
                $_SESSION['user_id'] = $res_user['user_id'];
                


                echo '<script>window.location.href="index.php";</script>';
                //   }else{
                //     echo '<script>window.location.href="index.php";</script>'; 

            }
        }
    }



    ?>

</head>

<body>

    <div class="container">
        <section id="login">
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                    <img src="assets/images/bru1.jpg" alt="">
                    <div class="text">
                        <span class="text-1">PROCURMENT SYSTEM A CASE STUDY <br>OF BURIRUM RAJABHAT UNIVERSITY</span>
                        <span class="text-2">Let's get connected</span>
                    </div>
                </div>

            </div>
            <div class="forms">
                <div class="form-content">
                    <div class="login-form">
                        <div class="title">Login</div>
                        <form action="" method="GET">
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input type="text" name="user_name" placeholder="username" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="pass_word" placeholder="password" required>
                                </div>
                                <div class="text"><a href="#">Forgot password?</a></div>

                                <div class="button input-box">
                                    <input type="submit" value="login">
                                </div>


                                <div class="text sign-up-text">Don't have an account? <label for="">Sigup now</label></div>
                            </div>
                        </form>
                    </div>

                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>


</body>

</html>