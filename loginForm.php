<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:adminPage.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:shop.html');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="StyleSheet/style1.css">
   <style>
     html{
      scroll-behavior: smooth;
    }
      /*=====================Nav start============*/
.nav-link-text{
    padding-top:10px ;
    padding-left: 10px;
    font-weight: 100;
    font-size: 18px;
    display: inline-block;
    color: rgb(255, 247, 232);
}
.nav-link-text a{
    text-decoration: none;
}
.wca-top-ul{
    padding-left: 930px;
}
.container-nav{
   width: 100%;
    min-height: 1vh;
    z-index: 888;
    background-color: white;
    box-sizing: border-box;
    position: fixed;
   
   
    
}
.navbar{
    width: 100%;
    display: flex;
    align-items: center;
    
}
.logo{
    width:100px;
    cursor: pointer;
    margin: 10px 60px;
    
    
    
}
.menu-icon{
    width:20px;
    display: none;
    cursor: pointer;
}
nav{
    flex: 1;
    text-align: right;
    
    margin-top: 10px;
    
   

}
nav ul li{
    list-style: none;
    display: inline-block;
    margin-right: 30px;
}
nav ul li a{
    text-decoration: none;
    color: black;
    font-size: 15px;
    font-weight: 600;
}
nav ul li a:hover{
    transition: 0.3s;
    color: rgba(183, 146, 54, 0.704);
}
.bi-suit:hover{
    transition: 0.3s;
    color: rgba(183, 146, 54, 0.704);
}


.navbar ul li.dropdown ul{
    
    position:absolute;
    
   text-align: left;
    padding-left:0 ;
    background-color: rgba(154, 218, 58, 0.768);
    display: flex;
    border-radius: 20px;
    min-width: 100px;
}
.navbar ul li.dropdown ul li a{
    color: black;
    padding-top: 15px;
    padding-bottom : 15px;
    
    
    text-align:left;
    padding-left: 7px;
    font-size: 18px;
   display: block;
    width: 180px;
}
.navbar ul li.dropdown ul li a:hover{
    transition: 0.3s;
    background-color: rgb(255, 247, 232);
    color: rgba(155, 124, 44, 0.704);
    border-radius: 20px;
    
}
.navbar ul li.dropdown:hover ul{
    display: block;
    transition: 0.5s;
    
    
}

.bi-suits:hover{
    transition: 0.3s;
    color: rgba(183, 146, 54, 0.704);
}


.navbar-top ul li{
    display: inline-block;
    margin-top: 10px;
    font-weight: 600;
 
    letter-spacing: 0.4ex;
    text-transform: uppercase;
}
.navbar-top{
    padding-left: 59%;
}
.navbar-top ul li a{
    text-decoration: none;
    color: black;
}
.navbar-top ul li a:hover{
    
    color: rgb(68, 53, 29);
}
/*=====================Nav Ends============*/

#Preloader{
  background: rgb(245, 245, 245) url(images/envato-leaf.gif) no-repeat center;
  height: 100vh;
  width: 100%;
  background-size: 40%;
  position: fixed;
  z-index: 900;
}

.displayNone{
  display: none;
} 


/*=========Footer Starts=======*/

.footer{
    min-height:10vh;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: linear-gradient(rgba(65, 74, 111, 0.7),rgba(4,9,30,0.7)),url(photo-1533460004989-cef01064af7e.jpg);
}

.para{
    padding-top: 8px;
    letter-spacing: 0.3ex;
    font-size: 14px;
}
.footer-head{
    font-size: 20px;
    font-weight: 600;
    color: black;
}
.para-list{
    text-align: left;
    color: rgb(193, 193, 193);
    font-size: 15px;
    justify-content: left;
    text-decoration: none;
    cursor: pointer;
}
.para-list:hover{
    color: white;
    transition: 0.2s;
}
.footer-last{
    display: flex;
    padding-top: 20px;
    
}
.footer-last-image{
    padding-left: 30%;
    
}

/*=========Footer Ends=======*/


/*----------------------*/




.Btn3 button {
    transition: all .5s ease;
    color: rgb(5, 189, 5);
    border: 1px solid rgb(8, 8, 8);
    font-family:'Montserrat', sans-serif;
    text-transform: uppercase;
    text-align: center;
    line-height: 1;
    background-color: #000;
    font-size: 17px;
    cursor: pointer;
    margin-left: 93%;
    margin-top: 41%;
    padding: 10px;
    outline: none;
    position: fixed;
    font-weight: 500;
    border-radius: 60px;
}
.Btn3 button:hover {
    color: white;
    background-color: rgb(16, 15, 15);
}





.overlay-social {
	position: fixed;
	  right: 0;
    top: 0;
    left: 0;
    bottom: 0;
	transition: opacity 500ms;
	visibility: hidden;
	opacity: 0;
}
.overlay-social:target {
	visibility: visible;
	opacity: 1;
  
}
.wrapper-social {
	margin-top: 110px;
    margin-left: 1050px;
	padding: 20px;
	background: #e7e7e7;
	border-radius: 5px;
	width: 30%;
	position: relative;
	transition: all 5s ease-in-out;
}
.wrapper-social h2 {
	margin-top: 0;
	color: #333;
}
.wrapper-social .close {
	position: absolute;
	top: 20px;
	right: 30px;
	transition: all 200ms;
	font-size: 30px;
	font-weight: bold;
	text-decoration: none;
	color: #333;
}
.wrapper-social .close:hover {
	color: #06D85F;
}
.wrapper-social .content-social {
	max-height: 30%;
	overflow: auto;
}
/*form*/

.container-social {
	border-radius: 5px;
	background-color: #e7e7e7;
	padding: 20px 0;
}
form label {
	text-transform: uppercase;
	font-weight: 500;
	letter-spacing: 3px;
}
input[type=text], select, textarea {
	width: 100%;
	padding: 12px;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
	margin-top: 6px;
	margin-bottom: 16px;
	resize: vertical;
}
input[type=number], select, textarea {
	width: 100%;
	padding: 12px;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
	margin-top: 6px;
	margin-bottom: 16px;
	resize: vertical;
}
input[type=email], select, textarea {
	width: 100%;
	padding: 12px;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
	margin-top: 6px;
	margin-bottom: 16px;
	resize: vertical;
}
input[type="submit"] {
	background-color: #413b3b;
	color: #fff;
	padding: 15px 50px;
	border: none;
	border-radius: 50px;
	cursor: pointer;
	font-size: 15px;
	text-transform: uppercase;
	letter-spacing: 3px;
}

.scrBar {
  background-color: #70c745;
  border-radius: 0;
  bottom: 0;
  box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.3);
  color: #ffffff;
  position: fixed;
  font-size: 24px;
  height: 40px;
  line-height: 40px;
  left: 50px;
  text-align: center;
  width: 40px;
 
  -webkit-transition-duration: 500ms;
  opacity: 0;
  transition-duration: 500ms; }
  #scrBar:hover {
    background-color: #303030; }


.scrBar.active{
  bottom: 32px;
  pointer-events: auto;
  opacity: 1;
}
   </style>

</head>
<body>
<div id="Preloader">
   <!-- ============= Srollbar Start ============== -->
   <a href="#"><div class="scrBar">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
        </svg>
       </div></a>

       <!-- ============= Scrollbar Ends ============== -->

</div>
    <!-- ============= Nav Start ============== -->
 <div class="container-nav">
        <div class="navbar">
            <img src="Untitled-1-01.svg" alt="" class="logo">
           
        <nav>
            <ul id="menulist">
                <li> <a href="GsHome.html">HOME</a></li>
                <li><a href="GsAbout.html">About US</a></li>
               
                <li><a href="Shome.html">Services</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="Gcontact.html">Contact Us</a></li>
                <li><a href="http://localhost/GardenStoreProject/loginForm.php" id="CloseLogRegis">Login/Register</a></li>
                <li title="my whislist"> <a href="whislist.html"> <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi-suit" viewBox="0 0 16 16">
                  <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                </svg></a></li>

                  <li title="my cart">
                    <a href="#sidebarOpen"  id="sidebarClose">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi-suits" viewBox="0 0 16 16">
                    <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                  </svg></li></a>

                  <li title="search"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi-suits" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></li>
            </ul>   
        </nav>
        <img src="images/menu.png" alt="" class="menu-icon" onclick="togglemenu">
        </div>
    </div>
     <!-- ============= Nav Ends ============== -->

     <section>
  <div class="Btn3">
         <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
         <a href="#divOne"  ><button id="CloseOne"><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-chat-text" viewBox="0 0 16 16">
             <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
             <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
           </svg></button></a>
     </div>
   <div class="overlay-social" id="divOne">
     <div class="wrapper-social">
       <h2>Please Fill up The Form</h2><a class="close" href="#CloseOne">&times;</a>
       <div class="content-social">
         <div class="container-social">
           <form>
             <label>Name</label>
             <input placeholder="Your name.." type="text">
             <label>Phone</label>
             <input placeholder="Your phone number.." type="number" >
                         <label>Email</label>
             <input placeholder="Your email.." type="email" >
             <label>Subject</label> 
             <textarea iplaceholder="Write something.."></textarea>
             <input type="submit" value="Submit">
           </form>
         </div>
       </div>
     </div>
   </div>
 </section>

<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="registerForm.php">register now</a></p>
   </form>

</div>
 <!-- ============= Footer Start ============== -->
 <footer class="footer bg-dark text-white pt-0 pb-0">

<div class="container text-center text-md-left">

  <div class="row text-center text-md-left">

    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-5">
      <img src="Untitled-1-01.svg" width="150px" height="50px">
      <p class="para">TruKisan is a one-stop-shop for all your gardening, farming and landscaping needs.</p>
      <div style="padding-top:40px; font-size:14px; font-weight:200;">
      <p>	TruKisan ©2021 Media with <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill color-black" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
      </svg> by <strong>Team Name</strong>  </p>

      <img style="padding-top:120px; " width="250%" src="https://trukisan.com/wp-content/themes/woodmart/images/payments.png" alt="payments" class="footer-last-image">
             
    </div>
      
    </div>

    <!-- Variable-->
    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
      <h5 class="footer-head text-uppercase mb-4 font-weight-bold">Recent Post</h5>
    
            <p>
                <a href="" class="para-list" style="text-decoration: none;"></a>
            </p>

            <p>
      <a href="" class="para-list" style="text-decoration: none;"></a>
    </p>
    <p>
      <a href="" class="para-list" style="text-decoration: none;"></a>
    </p>
    <p>
      <a href="" class="para-list" style="text-decoration: none;"></a>
    </p>
    

    </div>
    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
      <h5 class="footer-head text-uppercase mb-4 font-weight-bold">Company</h5>
    
            <p>
                <a href="" class="para-list " style="text-decoration: none;"> Home</a>
            </p>

            <p>
      <a href="" class="para-list" style="text-decoration: none;"> About Us</a>
    </p>
    <p>
      <a href="" class="para-list" style="text-decoration: none;"> Our Products</a>
    </p>
    <p>
      <a href="" class="para-list" style="text-decoration: none;"> Services</a>
    </p>
    <p>
      <a href="" class="para-list" style="text-decoration: none;"> My Account</a>
    </p>
    

    </div>

    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
      <h5 class="footer-head text-uppercase mb-4 font-weight-bold">Useful links</h5>
    <p>
      <a href="" class="para-list" style="text-decoration: none;"> Privacy Policy</a>
    </p>
    <p>
      <a href="" class="para-list" style="text-decoration: none;"> Returns</a>
    </p>
    <p>
      <a href="Gsterms.html" class="para-list" style="text-decoration: none;">Terms & Conditions</a>
    </p>
    <p>
      <a href="GsShipping.html" class="para-list" style="text-decoration: none;"> Shipping Policy</a>
    </p>
    <p>
      <a href="" class="para-list" style="text-decoration: none;"> Our Sitemap</a>
    </p>
    </div>

    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
      <h5 class="footer-head text-uppercase mb-4 font-weight-bold" >Get In Touch</h5>
      <p>
          <a href="" class="para-list" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-compass-fill" viewBox="0 0 16 16">
              <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24zm-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z"/>
            </svg> No 112, 2nd A Cross, 5th Block, Nagarbhavi 2nd Stage, Bangalore - 560072</a>
      </p>
      <p>
          <a href="" class="para-list" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
              <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
              <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg> Phone:<br>+91 7892252165</a>
      </p>
      <p>
          <a href="" class="para-list" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg> Email:<br>support@email.com</a>
      </p>
      
    </div>
    
  </div>

  <hr class="mb-4">

  <div class="row align-items-center">

    
         
    
  </div>
 
</div>

 

</footer>

<!-- ============= Footer End ============== -->
 <!-- ============= Just for prelaoding ============== -->
 <div class="displayNone">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/JOVKgws2N5A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/JOVKgws2N5A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/JOVKgws2N5A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/JOVKgws2N5A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
      <!-- ==================================== -->

</body>

<script>
var loader = document.getElementById("Preloader");

window.addEventListener("load" , function() {
  loader.style.display = "none";
  
})


const toTop = document.querySelector(".scrBar");

window.addEventListener("scroll", () => {
  if (window.pageYOffset > 50) {
    toTop.classList.add("active");
  } else {
    toTop.classList.remove("active");
  }
})
</script>

</html>