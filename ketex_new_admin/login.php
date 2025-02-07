<?php 
session_start();
$filename = basename($_SERVER['PHP_SELF']); ?>

<!DOCTYPE html>
<html class="no-js" lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Ketex Admin Panel</title>
        <link rel="shortcut icon" href="images/favicon.png">
        <!-- animation -->
        <link rel="stylesheet" href="css/animate.css" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
<section>
  
  <div class="box">
    
    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>
    
   <div class="container1"> 
    <div class="form"> 
      <h2>Ketex Admin Panel</h2>
      <form method="POST" action="loginCheck.php">
        <div class="inputBx">
          <input type="text" required="required" name="username" required>
          <span>Username</span>
          <img src="dist/img/1144709.png" alt="user">
        </div>
        <div class="inputBx password">
          <input id="password-input" type="password" name="password" required="required">
          <span>Password</span>
          <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
          <img src="dist/img/3427189.png" alt="lock">
        </div>
        <?php if(isset($_SESSION['login_message'])){?>
      <p style="margin-bottom: 20px;color: #fff;background-color: red;padding: 5px;"><?php echo $_SESSION['login_message'];?></p>
      <?php unset($_SESSION['login_message']); } ?>
        <div class="inputBx">
          <input type="submit" value="Log In"> 
        </div>
      </form>
    </div>
  </div>
    
  </div>
</section>
<style>

@import url("https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-shadow: border-box;
  font-family: "Source Sans Pro","Montserrat",Arial,"Helvetica Neue",sans-serif;
}

body {
  background-image: url(https://www.sagatraining.ca/wp-content/uploads/2018/10/background-images-for-login-form-8.jpg);
  overflow: hidden;
}

img {
  width: 32px;
}

section {
  display: flex;
  /*! justify-content: center; */
  align-items: center;
  min-height: 100vh;
  background: linear-gradient(-45deg, #ee775282, #e73c7e80, #23a6d580, #23d5ab80);
  background-size: 400% 400%;
  animation: gradient 10s ease infinite;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
.box {
  position: relative;
  margin-left: 15%;
}
.box .square {
  position: absolute;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(5px);
  box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 15px;
  animation: square 10s linear infinite;
  animation-delay: calc(-1s * var(--i));
  /*! display: none; */
}
@keyframes square {
  0%, 100% {
    transform: translateY(-20px);
  }
  50% {
    transform: translateY(20px);
  }
}
.box .square:nth-child(1) {
  width: 100px;
  height: 100px;
  top: -15px;
  right: -45px;
}
.box .square:nth-child(2) {
  width: 150px;
  height: 150px;
  top: 105px;
  left: -125px;
  z-index: 2;
}
.box .square:nth-child(3) {
  width: 60px;
  height: 60px;
  bottom: 85px;
  right: -45px;
  z-index: 2;
}
.box .square:nth-child(4) {
  width: 50px;
  height: 50px;
  bottom: 35px;
  left: -95px;
}
.box .square:nth-child(5) {
  width: 50px;
  height: 50px;
  top: -15px;
  left: -25px;
}
.box .square:nth-child(6) {
  width: 85px;
  height: 85px;
  top: 165px;
  right: -155px;
  z-index: 2;
}

.container1 {
  position: relative;
  padding: 50px;
  width: 260px;
  min-height: 380px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(5px);
  border-radius: 10px;
  box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
}

.container1::after {
  content: "";
  position: absolute;
  top: 5px;
  right: 5px;
  bottom: 5px;
  left: 5px;
  border-radius: 5px;
  pointer-events: none;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 2%);
}

.form {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
}
.form h2 {
  color: #fff;
  letter-spacing: 2px;
  margin-bottom: 30px;
}
.form .inputBx {
  position: relative;
  width: 100%;
  margin-bottom: 30px;
}
.form .inputBx input {
  width: 80%;
  outline: none;
  border: none;
  /*! border: 1px solid rgba(255, 255, 255, 0.2); */
  background: rgba(255, 255, 255, 0.2);
  padding: 11px 10px;
  padding-left: 40px;
  border-radius: 15px;
  color: #fff;
  font-size: 16px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}
.form .inputBx .password-control {
  position: absolute;
  top: 11px;
  right: 20px;
  display: inline-block;
  width: 20px;
  height: 20px;
  background: url(https://snipp.ru/demo/495/view.svg) 0 0 no-repeat;
  transition: 0.5s;
}
.form .inputBx .view {
  background: url(https://snipp.ru/demo/495/no-view.svg) 0 0 no-repeat;
  transition: 0.5s;
}
.form .inputBx img {
  position: absolute;
  top: 6px;
  left: 8px;
  transform: scale(0.6);
  filter: invert(1);
}
.form .inputBx input[type=submit] {
  background: #fff;
  color: #111;
  /*! max-width: 100px; */
  padding: 8px 10px;
  box-shadow: none;
  letter-spacing: 1px;
  cursor: pointer;
  transition: 1.5s;
  width: 100%;
}
.form .inputBx input[type=submit]:hover {
  background: linear-gradient(115deg, rgba(0, 0, 0, 0.1), rgba(255, 255, 255, 0.25));
  color: #fff;
  transition: 0.5s;
}
.form .inputBx input::placeholder {
  color: #fff;
}
.form .inputBx span {
  position: absolute;
  left: 30px;
  padding: 11px;
  display: inline-block;
  color: #fff;
  transition: 0.5s;
  pointer-events: none;
}
.form .inputBx input:focus ~ span,
.form .inputBx input:valid ~ span {
  transform: translateX(-30px) translateY(-35px);
  /*! font-size: 12px; */
}
.form p {
  color: #fff;
  font-size: 15px;
  margin-top: 5px;
}
.form p a {
  color: #fff;
  text-decoration: none;
  font-size: 17px;
}
.form p a:hover {
  /*! background-color: #000; */
  /*! background-image: linear-gradient(to right, #434343 0%, black 100%); */
  /*! -webkit-background-clip: text; */
  /*! -webkit-text-fill-color: transparent; */
  letter-spacing: 2px;
}

.remember {
  position: relative;
  display: inline-block;
  color: #fff;
  margin-bottom: 10px;
  cursor: pointer;
}
.form p a {
	transition: 500ms;
}
@media only screen and (max-width: 600px) {
.box .square {
	display: none;
}
.box {
	margin: 0 10px !important;
}
.container1 {
	padding: 15px;
	width: auto;
}
}
</style>
<?php include_once('footer.php'); ?>
<script>
function show_hide_password(target){
	var input = document.getElementById('password-input');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}
</script>