<!DOCTYPE HTML>
<html>
  <head>
    <title>Phonwork - voice</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body>
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
	  <nav> <ul> <li><a href="#menu">Menu</a></li> </ul> </nav>
	</div>
      </header>
      
    <!-- Menu --> 
    <?php include "menu.php"; ?>
      <!-- Main -->
      <div id="main">
	<div class="inner">
	  <h1>Voice</h1>
	  <span class="image main"><img src="images/modal_phonation.png" alt="" /></span>
	  <p>Exercises on voice, aka vocal fold vibration, and some basics of digital acoustic signal processing.</p>
	  
	  <!-- Table -->
	  <section>
	    <div class="table-wrapper">
	      <table>
		<thead> <tr><th>#</th><th>Exercise</th><th>Description</th></tr> </thead>
		<tbody>
                  <tr><td>2.1</td><td><a href="ex2_1.php">Laryngeal anatomy</a></td>
		    <td>The muscles and cartilages of the larynx, and the adduction and abduction of the vocal folds.</td></tr>
                  <tr><td>2.2</td><td><a href="ex2_2.php">The Myoelastic aerodynamic theory</a></td>
		    <td>Consideration of the muscular-elastic and aerodynamic forces that are involved in phonation.</td></tr>
                  <tr><td></td><td>IPA Practice</td>
		    <td></td></tr>
                  <tr><td>2.a</td><td><a href="ex2_a.php">Stop Voicing</a></td>
		    <td>Work with a partner, and practice IPA Production and Transcription.</td></tr>
                  <tr><td>2.b</td><td><a href="ex2_b.php">Consonant Voicing</a></td>
		    <td>Work with a partner, and practice IPA Production and Transcription.</td></tr>

		</tbody>
              </table>
	    </div>      
	  </section>
	  
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
	    <li>&copy; Keith Johnson. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
	  </ul>
	</div>
      </footer>
      
    </div>
    
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
    
  </body>
</html>
