<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Civic Chain</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon2.png" rel="icon">
  <link href="img/logo.png" rel="logo">

  <!-- Bootstrap CSS File  -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <!-- <link href="css/style.css" rel="stylesheet"> -->
  <link href="css/style-green.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
  session_start(); // Ensure the session is started

  // Check if the session variable 'username' is set and not empty
  if (isset($_SESSION["username"]) && !empty($_SESSION["username"])) {
    // User is logged in
    require "index/navbar_login.php";
  } else {
    // User is not logged in
    require "index/navbar.php";
  }
  ?>

  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(img/background.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h3 class="intro-title mb-4">"Speak Out, Stop Violence"</h3>
          <p class="intro-subtitle"><span class="text-slider-items">Silence fuels harm, Your voice brings change, Together we end violence</span><strong class="text-slider"></strong></p>
          <?php if (isset($_SESSION["username"]) && !empty($_SESSION["username"])): ?>
            <form action="issueForm.php" method="get">
              <button type="submit" class="button button-a button-big button-rouded">Report Issues</button>
            </form>
          <?php else: ?>
            <!-- If the user is not logged in, show the button but with JavaScript validation -->
            <form onsubmit="return checkLogin()" method="get">
              <button type="submit" class="button button-a button-big button-rouded">Report Issues</button>
            </form>
          <?php endif; ?>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Report Issue</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <!-- <div class="row">
                  <div class="col-sm-6 col-md-5">
                    <div class="about-img">
                      <img src="img/pp1.jpg" class="img-fluid rounded b-shadow-a" alt="">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-7">
                    <div class="about-info">
                      <p><span class="title-s">Name: </span> <span>Rohan Maharjan</span></p>
                      <p><span class="title-s">Profile: </span> <span>Full-stack developer</span></p>
                      <p><span class="title-s">Email: </span> <span>roharzan@gmail.com</span></p>
                      <p><span class="title-s">Phone: </span> <span>(977) 986-1767923</span></p>
                    </div>
                  </div>
                </div>
                <div class="skill-mf">
                  <p class="title-s">Skill</p>
                
                  <span>Java Core & JavaFX</span> <span class="pull-right">90%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                
                  <span>Spring Boot & Security</span> <span class="pull-right">75%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                
                  <span>HTML & CSS</span> <span class="pull-right">90%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                
                  <span>JavaScript</span> <span class="pull-right">85%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                
                  <span>PHP & MySQL</span> <span class="pull-right">90%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div> -->

                <div class="slider">
                  <div class="slides">
                    <!-- Slide 1 -->
                    <div class="slide">
                      <img src="img/about1.jpg" alt="Image 1">
                    </div>
                    <!-- Slide 2 -->
                    <div class="slide">
                      <img src="img/about2.jpg" alt="Image 2">
                    </div>
                    <!-- Slide 3 -->
                    <div class="slide">
                      <img src="img/about3.webp" alt="Image 3">
                    </div>
                    <!-- Add more slides as needed -->
                  </div>
                </div>

              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      ABOUT US
                    </h5>
                  </div>
                  <p class="lead">
                    Civic Chain is a dedicated web application focused on empowering communities to combat violence and foster safety.
                    We provide a platform where victims can confidentially report incidents of violence and access immediate helpline support.
                    Our mission is to create a secure and responsive network that bridges victims with the help they need.
                  </p>
                  <p class="lead">
                    Together, we strive to build a society free from fear and violence.
                    Through advanced data analysis and real-time reporting, Civic Chain identifies patterns to prevent future incidents and raise awareness.
                    We collaborate with local authorities, organizations, and support groups to ensure timely intervention.
                    Our vision is to create a connected, compassionate community where every voice is heard and every individual feels safe.
                  </p>
                  <!-- <p class="lead">
                    I am confident in my ability to tackle complex projects and deliver high-quality solutions. 
                    My experience in UI/UX design with Figma and WordPress enhances my skills in creating user-friendly 
                    applications. I look forward to contributing my expertise to a highly innovative team.
                  </p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--/ Section Services Star /-->
  <section id="category" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Category
            </h3>
            <p class="subtitle-a">
              Addressing key areas of societal impact through focused initiatives.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <img src="img/domestic violence.jpg" alt="">
            </div>
            <div class="service-content">
              <h2 class="s-title">Domestic Violence</h2>
              <p class="s-description text-center">
                Focusing on raising awareness and providing support to individuals affected by violence in their homes.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <img src="img/animalabuse.png" alt="">

            </div>
            <div class="service-content">
              <h2 class="s-title">Animal Abuse</h2>
              <p class="s-description text-center">
                Addressing the mistreatment of animals by promoting humane practices and advocating for animal rights.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <img src="img/digitalabuse.png" alt="">
            </div>
            <div class="service-content">
              <h2 class="s-title">Digital Abuse</h2>
              <p class="s-description text-center">
                Highlighting the challenges of cyberbullying, online harassment, and misuse of technology to harm others.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <img src="img/childabuse.png" alt="">
            </div>
            <div class="service-content">
              <h2 class="s-title">Child Abuse</h2>
              <p class="s-description text-center">
                Aiming to protect children from exploitation, neglect, and abuse by fostering a safe environment.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <img src="img/sexualharassment.png" alt="">
            </div>
            <div class="service-content">
              <h2 class="s-title">Sexual Harassment</h2>
              <p class="s-description text-center">
                Combating unwanted sexual advances and behavior through awareness and policy advocacy.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <img src="img/physicalabuse.png" alt="">
            </div>
            <div class="service-content">
              <h2 class="s-title">Physical Abuse</h2>
              <p class="s-description text-center">
                Working to prevent acts of physical harm and promoting safety and healing for survivors.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--/ Section Services End /-->

  <!-- <div class="section-counter paralax-mf bg-image" style="background-image: url(img/counters-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">450</p>
              <span class="counter-text">WORKS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">15</p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-people"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">550</p>
              <span class="counter-text">TOTAL CLIENTS</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ribbon-a"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">36</p>
              <span class="counter-text">AWARD WON</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!--/ Section Testimonials Star /-->
  <div class="testimonials paralax-mf bg-image" style="background-image: url(img/overlay-bg1.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="testimonial-mf" class="owl-carousel owl-theme">
            <div class="testimonial-box">
              <div class="author-test">
                <img src="img/testimonial-1.jpg" alt="" class="rounded-circle b-shadow-a" style="width: 100px; height: 100px;">
                <span class="author">Joe Biden</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                  No man has a right to raise a hand to a woman in anger other than in self-defense, and that rarely ever occurs. And so we have to just change the culture.
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
            <div class="testimonial-box">
              <div class="author-test">
                <img src="img/bankimoon.png" class="rounded-circle b-shadow-a" style="width: 100px; height: 100px;">
                <span class="author">Ban Ki-Moon</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                  Break the silence. When you witness violence against women and girls, do not sit back.
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--/ Section Portfolio Star /-->
  <section id="institutions" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">Institutions</h3>
            <p class="subtitle-a">
              Featuring institutions making a difference in society.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="work-box">
            <!-- <a href="img/cwin.jpg" data-lightbox="gallery-mf"> -->
            <div class="work-img">
              <img src="img/cwin.jpg" alt="Child Workers in Nepal" class="img-fluid">
            </div>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Child Workers in Nepal (CWIN)</h2>
                  <div class="w-more">
                    <span class="w-ctegory">Child Abuse</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                    <a href="https://cwin.org.np/"><span class="ion-ios-plus-outline"></span>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <!-- <a href="img/swag-labs.jpg" data-lightbox="gallery-mf"> -->
            <div class="work-img">
              <img src="img/katc.png" alt="Ktm Animal Treatment center" class="img-fluid">
            </div>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Kathmandu Animal Treatment Center</a></h2>
                  <div class="w-more">
                    <span class="w-ctegory">Advocacy and Support</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                    <a href="www.katcentre.org.np"><span class="ion-ios-plus-outline"></span></a>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <!-- <a href="img/calculator.png" data-lightbox="gallery-mf"> -->
            <div class="work-img">
              <img src="img/nepal-police.jpg" alt="Cyber Bureau" class="img-fluid">
            </div>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Nepal Police Cyber Bureau</h2>
                  <div class="w-more">
                    <span class="w-ctegory">Digital Abuse</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                    <a href="https://cyberbureau.nepalpolice.gov.np/"><span class="ion-ios-plus-outline"></span></a>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <!-- <a href="img/crudEmployee.png" data-lightbox="gallery-mf"> -->
            <div class="work-img">
              <img src="img/maitinepal.jpg" alt="Maiti Nepal" class="img-fluid">
            </div>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Maiti Nepal</h2>
                  <div class="w-more">
                    <span class="w-ctegory">Sexual Harassment</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                    <a href="https://maitinepal.org/"><span class="ion-ios-plus-outline"></span></a>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <!-- <a href="img/brr.jpg" data-lightbox="gallery-mf"> -->
            <div class="work-img">
              <img src="img/sneha.png" alt="Sneha Care" class="img-fluid">
            </div>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Sneha's Care</h2>
                  <div class="w-more">
                    <span class="w-ctegory">Shelter and Care</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                    <a href="www.snehacare.com"><span class="ion-ios-plus-outline"></span></a>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <!-- <a href="img/mrkalimba.png" data-lightbox="gallery-mf"> -->
            <div class="work-img">
              <img src="img/narco.jpg" alt="Narconon" class="img-fluid">
            </div>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Narconon Nepal</h2>
                  <div class="w-more">
                    <span class="w-ctegory">Addiction Treatment</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                    <a href="https://www.narcononnepal.org/"><span class="ion-ios-plus-outline"></span></a>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!--/ Section Portfolio End /-->




  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg1.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Send Message
                    </h5>
                  </div>
                  <div>
                    <form action="sendmail.php" method="post" role="form" class="contactForm">
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      Feel free to reach out with any questions or comments.
                      Looking forward to connecting!
                    </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span> Kathmandu, Nepal 44600</li>
                      <li><span class="ion-ios-telephone"></span> (977) 986-1767923</li>
                      <li><span class="ion-email"></span> civicchain@gmail.com</li>
                      <li>
                      <?php

                      // Check if the 'username' session variable is set
                      if (!isset($_SESSION['username'])) {?>
                        <a href="./admin/admin_login.php">
                          <span class="ion-person"></span><u>Admin Login</u>
                        </a>
                        <?php }?>
                      </li>

                    </ul>
                  </div>
                  <div class="socials">
                    <ul>
                      <li><a href="#"><span class="ico-circle"><i class="ion-email"></i></span></a></li>
                      <li><a href="#"><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                      <li><a href="#"><span class="ico-circle"><i class="ion-social-linkedin"></i></span></a></li>
                      <li><a href="#"><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>2024</strong> @Civic Chain. All Rights Reserved</p>
              <!-- <div class="credits">
                Crafted by Rohan Maharjan
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <link rel="stylesheet" type="text/css" href="css/snackbar.css">
  <!-- Snackbar -->
  <div id="snackbar">Your issue has been submitted successfully!</div>
  <script>
    // Function to show the snackbar
    function showSnackbar() {
      var snackbar = document.getElementById("snackbar");
      // Show the snackbar for 3 seconds
      snackbar.className = "show";
      setTimeout(function() {
        snackbar.className = snackbar.className.replace("show", ""); // Hide snackbar
      }, 3000); // Snackbar visible for 3 seconds
    }

    // Check if URL has the 'f=s' parameter and trigger snackbar
    <?php if (isset($_GET['f']) && $_GET['f'] === 's'): ?>
      showSnackbar(); // Show the snackbar if the parameter is 's'
    <?php endif; ?>
    <?php if (isset($_GET['f']) && $_GET['f'] === 'l'): ?>
      showSnackbar("You have successfully logged in!"); // Show custom message
    <?php endif; ?>
  </script>
  <script>
    // JavaScript function to check if the user is logged in
    function checkLogin() {
      // Check if the session variable 'username' is empty
      <?php if (!isset($_SESSION["username"]) || empty($_SESSION["username"])): ?>
        // Show an alert if the user is not logged in
        alert("Please log in first before reporting an issue.");
        // Redirect the user to the login page
        window.location.href = "users/login.php";
        return false; // Prevent form submission
      <?php endif; ?>
    }

    // Clean up URL by removing query parameters for 'f=s' or 'f=l'
    if (window.location.search.indexOf("f=s") > -1 || window.location.search.indexOf("f=l") > -1) {
      var newUrl = window.location.href
        .replace(/([?&])f=s/, '$1') // Remove f=s parameter
        .replace(/([?&])f=l/, '$1') // Remove f=l parameter
        .replace(/([&?])$/, ''); // Remove trailing & or ? if it exists
      window.history.pushState({}, document.title, newUrl);
    }
  </script>
</body>

</html>