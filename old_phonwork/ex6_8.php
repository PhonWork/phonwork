<!DOCTYPE HTML>
<html>
<head>
  <title>Nepali, four-way stop contrast</title>
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
	<h1>Nepali, four-way stop contrast</h1>
<span class="IPA">
	<table style="width: 100%">
	  <tr><td>[tʰal]</td><td>'plate'</td>
	      <td>[kʰam]</td><td>'envelope'</td>
	  </tr>
	  <tr><td>[tara]</td><td>'star'</td>
	      <td>[kam]</td><td>'work'</td>
	  </tr>
	  <tr><td>[dal]</td><td>'lentils'</td>
	      <td>[gaf]</td><td>'chit chat (n)'</td>
	  </tr>
	  <tr><td>[dʱan]</td><td>'uncooked rice'</td>
	      <td>[gʱar]</td><td>'house'</td>
	  </tr>
	  <tr><td>[dudʱ]</td><td>'milk'</td>
	      <td></td><td></td>
	  </tr>
	  </table>
</span>
<p>audio files provided by Martha Schwarz</p>
<p><input id="audio_questions" type="button" onclick="document.getElementById('theaudio').play();document.getElementById('answerbox').focus();" value="play"></p>

	  <input id="answerbox" type="text" onkeydown="if (event.keyCode == 13) check_answer()" placeholder="type answer here">
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
  <script src="assets/js/ex/ex6_8.js"></script>
</body>
</html>
