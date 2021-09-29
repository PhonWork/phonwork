<!DOCTYPE HTML>
<html>
<head>
  <title>Certificates</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="assets/css/main.css" />
  <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  <script src="assets/js/exercises.js"></script>
  <script>
function load_certs() {
    totcert=0;
    if (!test_for_local_storage()) {
        document.getElementById('message').innerHTML = "Local storage is not available in this browser";
    }
    for (var i in localStorage) {
        console.log(i + ": " + localStorage[i]);
        if (make_inline_png_cert(i)) { totcert++; }
    }
    document.getElementById('message').innerHTML = "Opened " + totcert + " certificates.";
}

function test_for_local_storage() {
    var mod = 'test';
    try {
        localStorage.setItem(mod, mod);
        localStorage.removeItem(mod);
        return true;
    } catch(e) {
        return false;
    }
}


    </script>
</head>
<body onload="load_certs()">
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
	<h1>Certificates</h1>
	<p>This page will try to reproduce all of the certificates of
	completion that are stored in your browser's local data
	  storage.  This only works if you are looking at this page from the same browser (and computer) that you used to complete the exercises.</p>

	<span id='message'></span>
	<span id='feedback'></span>
	<div id='certificate'></div>
	
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
</body>
</html>
