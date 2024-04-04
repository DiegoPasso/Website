   <title>Login/Cadastro</title>


   <?php
    require("Header.php");
   include("conexao.php");
   
           // CADASTRANDO AS INFORMAÇÕES NO BANCO DE DADOS
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["nome"];
    $email = $_POST["email"];
    $password = $_POST["senha"];
    $hashed_password = password_hash ($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO clientes (nome, email, senha) VALUES (?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt ->bind_param("sss", $name, $email, $hashed_password); 
    $stmt -> execute();
   }
   $conn->close();      
           ?>
   <!-- Formulário de cadastro -->
   <div class="col-sm-8 p-4">
       <h4 class="mb-4">Cadastro de Cliente</h4>
       <form class="border rounded p-2 border-primary" action="" method="post" name="registerForm">
           <div class="form-group">
               <div class="form-row">
                   <div class="col">

                       <label for="nome">Nome*</label>
                       <input type="text" name="nome" id="nome" class="form-control" required>
                       <label class="mt-2" for="senha">Senha*</label>
                       <input type="password" name="senha" id="senha" class="form-control" required>
                   </div>
                   <div class="col">
                       <label for="Email">Email*</label>
                       <input type="email" name="email" id="email" class="form-control" required>
                   </div>


               </div>
               <span class="d-block mt-2 text-danger">* Campo Obrigatório</span>
               <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
           </div>
           <a href='http://localhost/PHP/VIEW/Login.php'>Já possui cadastro? Faça login </a>
       </form>

   </div>
   </div>

   </div>

   <?php require "Footer.php"?>