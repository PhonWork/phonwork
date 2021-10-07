<!DOCTYPE HTML>
<html>
<head>
  <title>4.9 MRI images of fricative place of articulation</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="assets/css/main.css" />
  <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body onload="initialize()">
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
	<h1>MRI images of fricative place of articulation</h1>


	 <span id="video_here"></span>

	<p>What is the place of articulation of this voiceless fricative?<br>
<input type="button" id="b0" onclick="check_mc_answer(this.id)" value="bilabial">
<input type="button" id="b1" onclick="check_mc_answer(this.id)" value="labiodental">
<input type="button" id="b2" onclick="check_mc_answer(this.id)" value="dental">
<input type="button" id="b3" onclick="check_mc_answer(this.id)" value="alveolar">
<input type="button" id="b4" onclick="check_mc_answer(this.id)" value="postalveolar"><br>
<input type="button" id="b5" onclick="check_mc_answer(this.id)" value="retroflex">
<input type="button" id="b6" onclick="check_mc_answer(this.id)" value="palatal">
<input type="button" id="b7" onclick="check_mc_answer(this.id)" value="velar">
<input type="button" id="b8" onclick="check_mc_answer(this.id)" value="uvular">
<input type="button" id="b9" onclick="check_mc_answer(this.id)" value="pharyngeal">
<input type="button" id="b10" onclick="check_mc_answer(this.id)" value="glottal"></p>

	<p> <input type="button" onclick="play_video_example()" value="hear the answer"></p>

	  <span id="feedback"></span></p>
	<p style="font-size:small">Correct: <span id="correct">0</span> ---- Run: <span id="run">0</span></p>	

	<p style="font-size:small">See more MRIs of the IPA chart at <a href="http://sail.usc.edu/span/rtmri_ipa/">the Speech Production and Articulation Knowledge web site at USC</a>.

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
  <script src="assets/js/ex/ex4_9.js"></script>
</body>
</html>