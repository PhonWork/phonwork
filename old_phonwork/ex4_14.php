<!DOCTYPE HTML>
<html>
<head>
  <title>4.14 Transcribing Toda fricatives</title>
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
	<h1>Toda Fricative Transcription</h1>

	<p>Choose the correct transcription of the final fricative in these Toda words.</p>

<p><input id="audio_questions" type="button" onclick="document.getElementById('theaudio').play();" value="play"></p>

<p>
     <input type="button" id="b0" class="ipa" onclick="check_mc_answer(this.id)" value="f">
     <input type="button" id="b1" class="ipa" onclick="check_mc_answer(this.id)" value="θ">
     <input type="button" id="b2" class="ipa" onclick="check_mc_answer(this.id)" value="s̪">
     <input type="button" id="b3" class="ipa" onclick="check_mc_answer(this.id)" value="sᵞ">
     <input type="button" id="b4" class="ipa" onclick="check_mc_answer(this.id)" value="ʃ">
     <input type="button" id="b5" class="ipa" onclick="check_mc_answer(this.id)" value="ʂ">
     <input type="button" id="b6" class="ipa" onclick="check_mc_answer(this.id)" value="x">
     <br \>

	  <span id="feedback"></span></p>
	<p style="font-size:small">Correct: <span id="correct">0</span> ---- Run: <span id="run">0</span></p>	

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
  <script src="assets/js/ex/ex4_14.js"></script>
</body>
</html>
