<?php require "Header.php";
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}

$sql = "SELECT * FROM clientes WHERE email = ? AND nome = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $nome);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 1){
    $row = $result->fetch_assoc();

    if(password_verify($password, $row['senha'])){
        $_SESSION["usuario"] = $nome;
        
        header("Location: http://localhost/PHP/index.php");
        exit;
    }else{ 
        echo "<script language='javascript' type='text/javascript'>
        alert('Email ou senha informada está incorreto.');</script>";
} 
}
?>

<div class="container my-5">
    <!-- Campo de Login -->
    <div class="row row-cols-sm-2 justify-content-center border border-info bg-light">
        <div class="col-sm-4 p-4">
            <h4 class="mb-4">Faça login</h4>
            <form class="border rounded p-2 border-primary" method="post" name="loginForm">
                <div class="form-group">
                    <label for="Email">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <label class="mt-2" for="senha">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary mt-4">Entrar</button>

                </div>
                <a href='http://localhost/PHP/VIEW/Cadastro.php'>Não possui conta? Cadastre-se! </a>
            </form>
        </div>

    </div>
    <?php require "Footer.php"?>