<!DOCTYPE HTML>
<html>
<head>
  <title>3.11 Formants in an /i/ model</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="assets/css/main.css" />
  <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body onload="initialize(0)">
  <!-- Wrapper -->
  <div id="wrapper">
    <!-- Header -->
    <header id="header">
      <div class="inner">
	<!-- Logo -->
	<a href="index.php" class="logo">
	  <span class="symbol"><img src="media/images/logo.svg" alt="" /></span>
	  <span class="title">Phonwork</span>
	</a>
	<!-- Nav -->
	<nav><ul> <li><a href="#menu">Menu</a></li></ul></nav>
      </div>
    </header>
    <!-- Menu --> 
    <?php include "menu.php"; ?>
    <!-- Main -->
    <div id="main">
      <div class="inner">
	<h1>3.11 Formants in an [i] model</h1>


	 <span class="image fit"><img src="media/images/ex/i_tube.png" width="400px"></span>

	 <p>For this exercise assume:  
<i>l<sub>b</sub></i> = 8.5 cm, 
<i>l<sub>c</sub></i> = 4 cm, 
<i>l<sub>f</sub></i> =  3.5 cm. 
<i>A<sub>b</sub></i> = 3 cm<sup>2</sup>, 
<i>A<sub>c</sub></i> = 0.3 cm<sup>2</sup>.<br>
The relevants formulas are: &nbsp&nbsp&nbspf = c/2π * sqrt(A<sub>c</sub> / (A<sub>b</sub> l<sub>b</sub> l<sub>c</sub>)),&nbsp&nbsp&nbsp&nbsp f<sub>n</sub> = nc/2l, &nbsp&nbsp&nbsp&nbspf<sub>n</sub> = (2n-1)c/4l</p>

	<p><span id="question"></span>
	  <input id="answerbox" type="text" onkeydown="if (event.keyCode==13) check_answer()" placeholder="enter your answer here"></p>

	<p>It would be a good idea to write down your answers as you go.</p>
	  <span id="feedback"></span></p>
	<p style="font-size:small">Correct: <span id="correct">0</span> ---- Run: <span id="run">0</span></p>	

	<p>Image after figure 6.3 in Johnson (2012) <i>Acoustic and Auditory Phonetics. 3rd Ed.</i> Wiley-Blackwell</p>

      </div>
    </div>
    
    <!-- Footer -->
    <footer id="footer">
      <div class="inner">
	<section>
          <h2>Get in touch</h2> 
          <?php include "send_comment.php"; ?>
        </section>
        <section>
	  <h2>Follow</h2>
	  <ul class="icons">
	    <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
	    <li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
	  </ul>
	</section>
	<ul class="copyright">
	  <li>&copy; Keith Johnson. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>						</ul>
      </div>
    </footer>
    
  </div>
  
  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/skel.min.js"></script>
  <script src="assets/js/util.js"></script>
  <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/exercises.js"></script>
  <script src="assets/js/ex/ex3_11.js"></script>
</body>
</html>
