<!DOCTYPE HTML>
<html>
<head>
  <title>4.15 Transcribing Hindi Stops</title>
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
	<h1>Hindi Stop Transcription</h1>

	<p>Choose the correct transcription of the initial stop consonant of these Hindi words.</p>

<p><input id="audio_questions" type="button" onclick="document.getElementById('theaudio').play();" value="play"></p>

<p>
     <input type="button" id="b0" class="ipa" onclick="check_mc_answer(this.id)" value="p">
     <input type="button" id="b1" class="ipa" onclick="check_mc_answer(this.id)" value="t">
     <input type="button" id="b2" class="ipa" onclick="check_mc_answer(this.id)" value="ʈ">
     <input type="button" id="b3" class="ipa" onclick="check_mc_answer(this.id)" value="t̠ʃ">
     <input type="button" id="b4" class="ipa" onclick="check_mc_answer(this.id)" value="k"><br \>

     <input type="button" id="b5" class="ipa" onclick="check_mc_answer(this.id)" value="pʰ">
     <input type="button" id="b6" class="ipa" onclick="check_mc_answer(this.id)" value="tʰ">
     <input type="button" id="b7" class="ipa" onclick="check_mc_answer(this.id)" value="ʈʰ">
     <input type="button" id="b8" class="ipa" onclick="check_mc_answer(this.id)" value="t̠ʃʰ">
     <input type="button" id="b9" class="ipa" onclick="check_mc_answer(this.id)" value="kʰ"><br \>

     <input type="button" id="b10" class="ipa" onclick="check_mc_answer(this.id)" value="b">
     <input type="button" id="b11" class="ipa" onclick="check_mc_answer(this.id)" value="d">
     <input type="button" id="b12" class="ipa" onclick="check_mc_answer(this.id)" value="ɖ">
     <input type="button" id="b13" class="ipa" onclick="check_mc_answer(this.id)" value="d̠ʒ">
     <input type="button" id="b14" class="ipa" onclick="check_mc_answer(this.id)" value="ɡ"><br \>

     <input type="button" id="b15" class="ipa" onclick="check_mc_answer(this.id)" value="bʱ">
     <input type="button" id="b16" class="ipa" onclick="check_mc_answer(this.id)" value="dʱ">
     <input type="button" id="b17" class="ipa" onclick="check_mc_answer(this.id)" value="ɖʱ">
     <input type="button" id="b18" class="ipa" onclick="check_mc_answer(this.id)" value="d̠ʒʱ">
     <input type="button" id="b19" class="ipa" onclick="check_mc_answer(this.id)" value="ɡʱ"><br \>


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
  <script src="assets/js/ex/ex4_15.js"></script>
</body>
</html>
