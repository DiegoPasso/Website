<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

    <style>
    </style>
    <title>PensandoVei | Home</title>
</head>

<body>
    <?php
session_start();

?>

    <?php
    function deslogar(){
    session_unset();
    session_destroy();
    Header("Location:http://localhost/PHP/index.php");
    }
    
    if (isset($_POST['deslogar'])){
    deslogar();
} 


?>
    <header>
        <nav class="navbar navbar-expand-md text-light bg-dark">
            <a class="navbar-brand mr-auto" href="http://localhost/PHP/index.php">Não sei</a>
            <?php
          if (isset($_SESSION['usuario'])) {
         echo"<a class='nav-link' href='http://localhost/PHP/VIEW/Produtos.php'>Produtos</a>";}
           ?>
            <a class='nav-link' href='http://localhost/PHP/VIEW/Orçamento.php'>Faça um Orçamento!</a>
            <a class='nav-link' href='http://localhost/PHP/VIEW/Sobre.php'>Sobre</a>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <?php
                    if (isset($_SESSION['usuario'])){
                        
                       echo"  Olá, $_SESSION[usuario] 
                      <button class='btn btn-outline-danger' type='submit' name='deslogar'>Deslogar
                        <i class='pl-1 fas fa-user'></i></button>";
                    }else{
                    echo"<a class='nav-link' href='http://localhost/PHP/VIEW/Login.php'>Login | Cadastre-se
                        <i class='pl-1 fas fa-user'></i></a>";
                    }

                    ?>
                </li>
        </nav>
    </header>