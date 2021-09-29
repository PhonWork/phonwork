<!DOCTYPE HTML>
<html>
<head>
  <title>Guess the word</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="assets/css/main.css" />
  <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  <!-- Scripts -->
  <!-- <script src="assets/js/jquery.min.js"></script>  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="assets/js/skel.min.js"></script>
  <script src="assets/js/util.js"></script>
  <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/exercises.js"></script> 
  <script src="https://cdn.rawgit.com/evanplaice/jquery-csv/109ae716/src/jquery.csv.js"></script>
  <script src="Guess-the-Word/newguess.js"></script>

</head>
<body onload="load_guess(1)">
  <!-- Wrapper -->
  <div id="wrapper">
    <!-- Header -->
    <header id="header">
      <div class="inner">
	<!-- Logo -->
	<a href="index.php" class="logo">
	  <span class="symbol"><img src="images/logo.svg" alt="" /></span>
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
	<h1>Guess the word</h1>
	  <p>blue = tongue, red = jaw, green = lips.</p>

	<canvas id="guess" width="600" height="275" class="image fit"></canvas>

	<p><input type="button" value="0" onclick="process_button_click(0)" id="b0"> 
	<input type="button" value="1" onclick="process_button_click(1)" id="b1"> 
	<input type="button" value="2" onclick="process_button_click(2)" id="b2"> 
	<input type="button" value="3" onclick="process_button_click(3)" id="b3"> </p>

	<p style="font-size:small">Correct: <span id="correct">0</span> ---- Run: <span id="run">0</span></p>	
	<p><span id="feedback"></span></p>
	<p>made by: Eric Chen

	  <br> data: Westbury, J.R. (1994) 'X-ray Microbeam Speech
Production Database User's Handbook.' Waisman Center on Mental
Retardation and Human Development, University of Wisconsin, Madison,
WI.

</p>

      </div>  <!-- inner -->
    </div> <!-- main -->
    
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
  

</body>
</html>
