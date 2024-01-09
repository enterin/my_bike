<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   
    <title>Apnabook</title>
    <link rel="icon" href="images/favicon.png" type="image/gif" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="fonts\fontawesome-webfont.ttf">
    <link rel="stylesheet" href="fonts\fontawesome-webfont.ttf">
    <link rel="stylesheet" href="fonts\fontawesome-webfont.woff">
    <link rel="stylesheet" href="fonts\fontawesome-webfont.woff2">
   



    <style>
    
    *{
        margin: 0%;
        padding: 0%;
        box-sizing: border-box;
    }
    body{
        
    font-family: 'Mulish', sans-serif;
   
    background-color: #ffffff;
    overflow-x: hidden;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
      
  
  
    }
    
    .container{
        display: flex;
        background-color: #063547;
        padding: 8px 0;
        position: relative;
        min-height: 10vh;
        color: #fff;
       
       text-align: center;
      
}
.fa-search::before {
  content: "";
}
.nav-area{
    padding-left:42vw;
}
.nav-ul{
    display: flex;
  
  color: #ffffff;
  margin-top: 7px;
}
.nav-li{
    display: flex;
    padding: 10px 31px;
    list-style: none;
    text-decoration: none;
}
.nav-li a{
    font-size: 1rem;
font-weight: 400;
line-height: 1.5;
color: #ffffff;
font-family: 'Mulish', sans-serif;
text-decoration: none;
}

.log-text{
    margin-top: 10px;
    font-size: 24px;
font-weight: bold;
padding-left: 15px;
}
.search_form .form-control {
  border-radius: 45px;
  height: 40px;
  min-width: unset;
  border: none;
}
.form-control {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.fa {
  display: inline-block;
  font-style: normal;
  font-variant: normal;
  font-weight: normal;
  font-stretch: normal;
  line-height: 1;
  font-family: FontAwesome;
  font-size-adjust: none;
  font-kerning: auto;
  font-optical-sizing: auto;
  font-language-override: normal;
  font-feature-settings: normal;
  font-variation-settings: normal;
  
  font-size: inherit;
  text-rendering: auto;
}
.search_form {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  margin: 0;
  position: relative;
  margin-top: 7px;
 
}
button, input {
  overflow: visible;
}
input, button, select, optgroup, textarea {
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}

.search_form button {
  position: absolute;
  top: 3px;
  right: 3px;
  width: 35px;
  height: 35px;
  padding: 0;
  border: none;
  outline: none;
  color: #ffffff;
  background-color: #44b89d;
  border-radius: 100%;
}

button, select {
  text-transform: none;
}
button, input {
  overflow: visible;
}
input, button, select, optgroup, textarea {
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}













.slider_section {
  border: 0px solid #ffffff;
  width: 100%;
  height: 80%;
  display: flex;
  align-items: center;
  padding: 75px 0;
  background-color: #f5f6f9;
  overflow: hidden;
  position: relative;
}
.row {

  display: flex;
  flex-wrap: wrap;
  margin-left: 13vw;
height: 70vh;
width: 85vw;
margin-top: 7vw;
}
.col-1{
  
  flex: 0 0 50%;
  max-width: 40%;
  overflow: hidden;
}
.col-2{
  
  flex: 0 0 50%;
  max-width: 50%;
  margin-left: 3vw;
  
}
.slider_section .detail-box h6 {
  color: #44b89d;
  font-size: 1.25rem;
}
h5, .h5 {
  font-size: 1.25rem;
}
.slider_section .detail-box h1 {
  font-weight: bold;
  margin-bottom: 25px;
  line-height: 58px;
  font-size: 3rem;
}
p {
  margin-top: 0;
  margin-bottom: 1rem;
}
.slider_section .detail-box a {
  display: inline-block;
  padding: 10px 45px;
  background-color: #44b89d;
  color: #ffffff;
  border-radius: 45px;
  border: 1px solid #44b89d;
  
  transition: all 0.3s;
  margin-top: 15px;
}
.slider_section .img-box img {
  width: 85%;
  height: 40%;
 
}




.categories-container{
  width: 100%;
  height: 80%;
  border: 2px solid #fff;
  background-color: #ffffff;
  position: relative;
  align-items: center;
  align-content: center;
}
.categories-tags{

  text-align: center;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
  padding: 10px;

}
.categories-tags h1{
  font-weight: bold;
  text-align: center;
  font-size: 2rem;
  color: #212529;


}
.categories{
  width: 100%;
  height: 100%;
  align-items: center;
  display: flexbox;
  display: flex;
  flex-wrap: wrap;
  padding: 10px;
  margin-left: 10vw;
  padding-top: 5vh;
}
.categoriesbox{
  width: 20%;
margin-left: 5vw;
margin-top:5vh;
justify-self: auto;
justify-content: space-evenly;
} 


.categoriesbox .img-box {
  width: 110px;
  min-width: 110px;
  height: 110px;
  margin-bottom: 15px;
  position: relative;
  
  display: flex;
 
  justify-content: center;
  
  align-items: center;
  background: #f1f2f3;
  border-radius: 100%;
}
.img-box{

  margin-left: 6vw;
}
 .img-box img {
  width: 55px;
  align-items: center;
  justify-content: center;
}
.detail-box h5 {
  font-weight: bold;
  text-align: center;
}
.detail-box p {
  margin: 0;
}





.about_section {
  position: relative;
  background-color: #f5f6f9;
  margin-top: 7vw;
}

.container {
  width: 100%;
}
.row3 {
  
  display: flex;
  flex-wrap: wrap;
}
.col-md-6 {
  flex:50%;
  max-width: 50%;
}
.about_section .img-box3 img {
  width: 75%;
  padding-top: 25vh;
}
.heading_container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding-top: 32vh;
}
.heading_container h2 {
  position: relative;
  font-weight: bold;
}
h2, .h2 {
  font-size: 2rem;
}
.about_section .detail-box3 p {
  margin-top: 15px;
  margin-right: 7vw;
}
.about_section .detail-box3 a {
  display: inline-block;
  padding: 10px 45px;
  background-color: #44b89d;
  color: #ffffff;
  border-radius: 45px;
  border: 1px solid #44b89d;
  transition: all 0.3s;
  margin-top: 15px;
  margin-right: 36vw;
}











.layout_padding {
  padding: 90px 0;
}
article, aside, figcaption, figure, footer, header, hgroup, main, nav, section {
  display: block;
}
.container1 {
  width: 80%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
  padding: 10px;
}
.heading_container.heading_center {
  align-items: center;
  text-align: center;
}
.row3 {
 
  display: flex;

  flex-wrap: wrap;
 
}
.ml-auto, .mx-auto {
  margin-left: auto !important;
}
.client_section .client_container {
 
  display: flex;
  flex-direction: column;
  margin: auto;
  margin-top: auto;
  margin-top: 45px;
}
.client_section .client_container .detail-box3 {
  
  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
  padding: 15px;
  margin-bottom: 25px;
  border-radius: 25px;
  background: #063547;
  color: #ffffff;
  margin-left: 2vw;
}
.detail-box3 p {
  margin-top: 0;
  margin-bottom: 1rem;
}
.client_section .client_container .detail-box span {
  margin-top: 25px;
  color: #44b89d;
  font-size: 28px;
}
.client_section .client_container .client_id {
  display: flex;
  align-items: center;
}
.client_section .client_container .img-box3 {
  width: 125px;
  margin-right: 15px;
}
.client_section .client_container .img-box3 img {
  width: 100%;
  border-radius: 100%;
}
.client_id h5 {
  color: #1d1b28;
  font-weight: 600;
  margin-bottom: 5px;
}
.layout_padding {
  padding: 90px 0;
}



.blog_section {
  background-color: #f5f6f9;
}
.container4 {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.row4 {
display: flex;
flex-wrap: wrap;

}
.blog_section .box {
  margin-top: 55px;
  
  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.15);
  margin: 10%;
}
.blog_section .box .img-box4 {
  position: relative;
}
.blog_section .box .img-box4 img {
  width: 100%;
}
.blog_section .box .img-box4 .blog_date {
  position: absolute;
  left: 25px;
  bottom: 0;
  padding: 10px 25px;
  font-size: 18px;
  background-color: #063547;
  margin: 0;
  
  display: flex;

  justify-content: center;
  
  align-items: center;
  text-align: center;
  border: 3px solid #ffffff;
  color: #ffffff;
  border-radius: 45px;
  transform: translateY(50%);
}
.blog_section .box .img-box4 .blog_date {
  font-size: 18px;
  text-align: center;
  color: #ffffff;
}
.blog_section .box .detail-box4 {
  padding: 45px 25px 25px 25px;
  background: #ffffff;
}


.blog_section .box .detail-box4 h5 {

    font-weight: bold;

}
.blog_section .box .detail-box4 p {
  font-size: 15px;
}
.blog_section .box .detail-box4 a {
  color: #44b89d;
  text-decoration: none;
  list-style: none;
}
a {
 
  background-color: transparent;
}



.center_self .input1{
  margin-left:20vw;
  margin-top:5vw;
  padding:5px;
  align-items: center;
  justify-content: center;
  border-radius: 110px;
  border:2px solid black;
  margin-bottom: 3vw;
}
container {
  
  padding: 26px;
  font-size: 20px;
}
.center_self .bt{
  
  margin-top:5vw;
  padding:5px;
  align-items: center;
  justify-content: center;
  border-radius: 110px;
  border:2px solid black
}
.self_intro{
  margin-top: 3vw;
  font-size: 20px;
  margin-bottom: 3vw;
}


    </style>
</head>
<body>
    <header class="container">
        <div class="log-text">
            <span>
            Apnabook
            </span>
        </div>
        <div class="nav-area">
            <ul class="nav-ul">
                <li class="nav-li"><a href="home.php">Home</a></li>
                <li class="nav-li"><a href="books.php">books</a></li>
                <li class="nav-li"><a href="about.html">About</a></li>
                <li class="nav-li"><a href="category.html">Categories</a></li>
                <li class="nav-li"><a href="blog.html">Blog</a></li>
                <li class="nav-li"><a href="contct.php">Contact</a></li>


            </ul>

        </div>
      
    </header>


     <!-- slider section -->
     <section class="slider_section ">
      <div class="row">
        <div class="col-1">
          <div class="detail-box">
            <h6>
              Apnabook Bookstore
            </h6>
            <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quam velit saepe dolorem deserunt quo quidem ad optio.
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-2">
          <div class="img-box">
            <img src="images\slider-img.png" alt="not found">
          </div>
        </div>
        
      </div>


      </section>
    <!-- end slider section -->
  </div>

  
  <!-- catagory section -->

 <section class="categories-container">
  <div class="categories-tags">
    <h1>Books Categories</h1>
    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>

  </div>
  <div class="categories">
    <div class="categoriesbox">
      <div class="img-box">
        <img src="images/cat1.png" alt="">
      </div>
      <div class="detail-box">
        <h5>
          Textbooks
        </h5>
        <p>
          fact that a reader will be distracted by the readable content of a page when looking at its layout.
          The
          point of using
        </p>
      </div>
    </div>
    <div class="categoriesbox">
      <div class="img-box">
        <img src="images/cat1.png" alt="">
      </div>
      <div class="detail-box">
        <h5>
          Textbo
          oks
        </h5>
        <p>
          fact that a reader will be distracted by the readable content of a page when looking at its layout.
          The
          point of using
        </p>
      </div>
    </div>
    <div class="categoriesbox">
      <div class="img-box">
        <img src="images/cat1.png" alt="">
      </div>
      <div class="detail-box">
        <h5>
          Textbooks
        </h5>
        <p>
          fact that a reader will be distracted by the readable content of a page when looking at its layout.
          The
          point of using
        </p>
      </div>
    </div>
    <div class="categoriesbox">
      <div class="img-box">
        <img src="images/cat1.png" alt="">
      </div>
      <div class="detail-box">
        <h5>
          Textbooks
        </h5>
        <p>
          fact that a reader will be distracted by the readable content of a page when looking at its layout.
          The
          point of using
        </p>
      </div>
    </div>
    <div class="categoriesbox">
      <div class="img-box">
        <img src="images/cat1.png" alt="">
      </div>
      <div class="detail-box">
        <h5>
          Textbooks
        </h5>
        <p>
          fact that a reader will be distracted by the readable content of a page when looking at its layout.
          The
          point of using
        </p>
      </div>
    </div>
    <div class="categoriesbox">
      <div class="img-box">
        <img src="images/cat1.png" alt="">
      </div>
      <div class="detail-box">
        <h5>
          Textbooks
        </h5>
        <p>
          fact that a reader will be distracted by the readable content of a page when looking at its layout.
          The
          point of using
        </p>
      </div>
    </div>
  </div>
 </section>

  <!-- end catagory section -->
 
  <!-- about section -->

  

  <!-- end about section -->


    <!-- end client section -->



     <!-- blog section -->

  <section class="blog_section">
    <div class="container4">
      <div class="heading_container heading_center">
        <h2>
          From Our Blog
        </h2>
      </div>
      <div class="row4">
        <div class="col-md-6">
          <div class="box">
            <div class="img-box4">
              <img src="images/b1.jpg" alt="">
              <h4 class="blog_date">
                <span>
                  15 January 2023
                </span>
              </h4>
            </div>
            <div class="detail-box4">
              <h5>
                Eius, dolor? Vel velit sed doloremque
              </h5>
              <p>
                Incidunt magni explicabo ullam ipsa quo consequuntur eveniet illo? Aspernatur nam dolorem a neque? Esse eaque dolores hic debitis cupiditate, ad beatae voluptatem numquam dignissimos ab porro
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="img-box4">
              <img src="images/b2.jpg" alt="">
              <h4 class="blog_date">
                <span>
                  15 January 2023
                </span>
              </h4>
            </div>
            <div class="detail-box4">
              <h5>
                Minus aliquid alias porro iure fuga
              </h5>
              <p>
                Officiis veritatis id illo eligendi repellat facilis animi adipisci praesentium. Tempore ab provident porro illo ex obcaecati deleniti enim sequi voluptas at. Harum veniam eos nisi distinctio! Porro, reiciendis eius.
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end blog section -->


  <section class="about_section">
    <div class="container">
      <div class="row3">
        <div class="col-md-6">
          <div class="img-box3">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box3">
            <div class="heading_container">
              <h2>
                About Our Bookstore
              </h2>
            </div>
            <p>
              At cumque tenetur iste molestiae, vel eum reiciendis assumenda! Numquam, repudiandae. Consequuntur obcaecati recusandae aliquam, amet doloribus eius dolores officiis cumque? Quibusdam praesentium pariatur sapiente mollitia, amet hic iusto voluptas! Iusto quo earum vitae excepturi, ipsam aliquid deleniti assumenda culpa deserunt.
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>
 <!-- footer section -->
 <footer class="footer_section">
  <div class="container">
    <div class="self_intro">
    <h6>devloped by:-Apnabook team members</h6>
    <h6>Contact-us:91067xxxxx</h6>
    <h6>mail:-"Apnabook@gmail.com"</h6>
    
    </div>
   <div class="center_self">
    <input type="text" class="input1" value="search.."/>
    <input type="button" class="bt"  value="Submit">
    </div>
   <div class="self_links">
    
   </div>

 
</footer>

  








</body>
</html>