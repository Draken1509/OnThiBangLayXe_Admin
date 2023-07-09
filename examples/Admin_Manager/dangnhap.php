<?php


use Firebase\Auth\Token\Exception\InvalidToken;

session_start();
$_SESSION['status'] = "";
include('dbcon.php');
$tb = "";
if (isset($_POST['submit'])) {

   $email =$_POST['email'];
   $clearTextPassword=$_POST['password'];
   try {   
        $user = $auth->getUserByEmail("$email");  
        $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
        $idTokenString=$signInResult->idToken();         
        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            // $uid = $verifiedIdToken->claims()->get('sub');        
            // $_SESSION['verified_user_id'] = $uid;
            $_SESSION['idTokenString'] = $idTokenString;
            $_SESSION['status'] = 'Đăng nhập thành công';                
            header('Location:index.php');
            exit();
        } catch (InvalidToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        } catch (\InvalidArgumentException $e) {
            echo 'The token could not parsed: '.$e->getMessage();
        }        
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e){
        $_SESSION['status'] = 'Email không tồn tại';     
        // header('Location:dangnhap.php');                     
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng nhập</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="dinhdang/dinhdang.css">

</head>
<style>
   .form-container {
      min-height: 100vh;
      background-color: var(--light-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      background-image: url("1.jpg");
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      background-repeat: no-repeat;
   }

   .form-container form {
      padding: 2rem;
      width: 50rem;
      border-radius: .5rem;
      box-shadow: var(--box-shadow);
      border: var(--border);
      background-color: rgba(0, 0, 0, 0.3);
      text-align: center;
   }

   .form-container form .box {
      width: 100%;
      border-radius: .5rem;
      background-color: rgba(0, 0, 0, 0.3);
      padding: 1.2rem 1.4rem;
      font-size: 1.8rem;
      color: white;
      border: var(--border);
      margin: 1rem 0;
   }

   .btn {
      background-color: var(--blue);
   }
</style>

<body>

   
   <div class="form-container">
      <form action="dangnhap.php" method="post">
         <h3 style="color:white;">Đăng nhập</h3>
         <input type="text" name="email" placeholder="Tên đăng nhập" required class="box">
         <input type="password" name="password" placeholder="Mật khẩu" required class="box">
         <input type="submit" name="submit" value="Đăng nhập" class="btn">
         <h1 style="color:cornsilk">   <?php echo  $_SESSION['status'] ?> </h1>

      </form>
   </div>
   
</body>

</html>