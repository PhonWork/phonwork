<!DOCTYPE HTML>
<html>
  <head>
    <title>Phonwork - Speech Motor Control</title>
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
	  <h1>Speech Motor Control</h1>
	  <span class="image main"><img src="images/xray_traces.png" alt="" /></span>
	  <p>Exercises on the control of speech articulation</p>
	  
	  <!-- Table -->
	  <section>
	    <div class="table-wrapper">
	      <table>
		<thead> <tr><th>#</th><th>Exercise</th><th>Description</th></tr> </thead>
		<tbody>
                  <tr><td>10.1</td><td><a href="ex10_1.php">Guess the word - sagittal view</a></td>
		    <td>Based on X-ray microbeam data - can you guess the word?.</td></tr>
                  <tr><td>10.2</td><td><a href="ex10_2.php">Guess the word - time traces</a></td>
		    <td>Based on X-ray microbeam data - can you guess the word?.</td></tr>
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
