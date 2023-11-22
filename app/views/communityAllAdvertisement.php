<?php 
        require_once './header/header.php';
        require_once "../controllers/PostControler.php";
        require_once "../controllers/CommunityController.php";
        $vistaP = new PostController();
        $community = new CommunityController();
        $commu = $_GET["id"]; //per al id de la comunitat
        
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="../css/postCommunity.css" rel="stylesheet">
</head>
<body>
      <input type ="hidden" id = "idCommu" value ="<?php echo $commu ?>">
      <h1 class ="col text-center">Bienvenidos a los anuncios de <?php echo $community->getNomComunitat($commu)?></h1>

      <section class='container-xl'>
        <section id="products-container" class = "row my-5 mx-2" ></section>
        <div id="pagination-container"></div>      
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="../js/communityAllAdv.js"></script>
</body>

<?php
    require_once './footer/footer.php';
} else {
  require_once './header/header.php';
?>
 <body>
            <div class="container mt-3 w-50">
                <div class="alert alert-danger" role="alert">
                    Para acceder <a href="./sign_up.php" class="alert-link">regístrate</a> o <a href="./sign_in.php" class="alert-link">inicia sesión</a>
                </div>
            </div>
  </body>
<?php
  require_once './footer/footer.php';

} 
?>