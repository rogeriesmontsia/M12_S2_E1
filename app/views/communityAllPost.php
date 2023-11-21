<?php 
        require_once './header/header.php';
        require_once "../controllers/PostControler.php";
        $vistaP = new PostController();
        $commu = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
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

      <!--Section: Content-->
      <section>
        <section id="products-container" class = "row my-5 mx-2" ></section>

        

        <div id="pagination-container"></div>      
      </section>

      
    </div>
  </main>
  <!--Main layout-->

    <?php
        include './footer/footer.php';
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/communityAllPost.js"></script>

</body>
</html>