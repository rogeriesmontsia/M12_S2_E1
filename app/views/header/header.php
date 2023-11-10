<?php session_start();

// Verifica si 'user_name' está definido en la sesión
if (isset($_SESSION['username'])) {
    // Muestra un saludo personalizado
    if (isset($_SESSION)){
    echo '<p>Hola, ' . $_SESSION['username'] . '!</p>';
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/views/header/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/views/header/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/views/header/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="/views/header/css/style.css">

    <title>Daw 2023</title>
  </head>
  <body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target bg-white" role="banner" style="position: sticky; top: 0;">

        <div class="container">
          <div class="row align-items-center position-relative">
    <!-- Menu esquerra (apartats important landing page)-->

            <div class="col-lg-5">
              <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li class="active"><a href="header.html" class="nav-link">Inici</a></li>
                  <li><a href="project.html" class="nav-link">Proyectos</a></li>
                  <li><a href="services.html" class="nav-link">Tu comunidad</a></li>
                </ul>
              </nav>
            </div>

    <!-- LOGO o Nom -->

            <div class="col-lg-2 text-center">
              <div class="site-logo">
                <!-- Cambiar per link de registre o acces -->
                <a href="header.html">K0munitat</a>
              </div>

    <!-- Menu dreta (blog,about,etc) -->

              <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3 text-black"></span></a></div>
            </div>
            <div class="col-lg-5">
              <nav class="site-navigation text-left mr-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li><a href="#sobre-nosotros" class="nav-link">Sobre nosotros</a></li>
                <li><a href="blog.html" class="nav-link">Blog</a></li>
                  <li><a href="contact.html" class="nav-link">Acceso</a></li>
                </ul>
              </nav>
            </div>
            

          </div>
        </div>

      </header>
    

      <div class="hero" style="background-image: url('/views/header/images/hero_1.jpg'); background-size: cover; background-position: center; width: 100%; height: 400px; position: relative;">
    <div style="background-color: rgba(0, 0, 0, 0.6 ); position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding: 20px;">
    </div>
</div>
  


    <script src="/views/header/js/jquery-3.3.1.min.js"></script>
  
    <script src="/views/header/js/jquery.sticky.js"></script>
    <script src="/views/header/js/main.js"></script>
  </body>
</html>