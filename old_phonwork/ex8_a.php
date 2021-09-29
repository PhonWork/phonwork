<!DOCTYPE HTML>
<html>
<head>
  <title>8.a  IPA practice, Complex sounds</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="assets/css/main.css" />
  <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body onload="init_practice()">
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
	<nav>
	  <ul>
	    <li><a href="#menu">Menu</a></li>
	  </ul>
	</nav>
      </div>
    </header>
    <!-- Menu --> 
    <?php include "menu.php"; ?>
    <!-- Main -->
    <div id="main">
      <div class="inner">
	<h1>Practice reading and writing IPA: Complex Sounds</h1>
	
	<p>Work with a partner.  
<br>1. Person 1 sees the screen and reads out the word written below in IPA. 
<br>2. Person 2 writes an IPA transcription of what Person 1 said. 
<br>3. Compare the IPA transcriptions. Do they match?  If not, what went wrong?
<br>4. Take turns being 'person 1' and 'person 2'.
</p>
	
	
	<p>Read this IPA transcription outloud for your partner: 
	  <span class="IPA" id="practice_item" style="font-size:3em"></span></p>
	 <p><input type="button" onclick="play_audio_example()" value="hear the answer"></p>
	  <input type="button" onclick="next_practice()" value="next"></p>
	<p style="font-size:small">Items done: <span id="run">0</span></p>	

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
  <script src="assets/js/ex/ex8_a.js"></script>
</body>
</html>
