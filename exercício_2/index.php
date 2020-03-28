<?php
 if(isset($_GET["deslogar"])){
  session_start();
  unset($_SESSION["user"]);
  header("location: index.php"); 
 }

if(isset($_POST['nome']) && isset($_POST["senha"])){ 
  if($_POST['nome'] != "" && $_POST['senha'] != ""){
    session_start();
    $_SESSION['user'] = $_POST['nome'];
  header("location: index.php"); // voltar p index
}
}else{ // se n ver nenhum dado p formulario
  session_start();
  if(!isset($_SESSION['user'])){ 

		?>
<form method="POST" action="index.php">
Para continuar, precisamos confirmar se seu login condiz com nossos dados na database. Digite seu nome abaixo:<br>
  <input type="text" id="nome" name="nome" placeholder="Nome"><br>
  <input type="password" id="senha" name="senha" placeholder="senha"><br>
  <input type="submit" value="Acessar">
</form> 

<?php
	}else{ // se existir cookie
        echo "<center><h4>Seu nome condiz com a database, pode acessar!</h4><br>";
        echo "<h2>Bem vindo, " . $_SESSION['user'] . "</h2>";
        echo "<h3> acesso liberado por um dia </h3>"; 
		echo "<br> <a href='?deslogar=true'><button>Deslogar</button></a></center>"; // botão p deslogar
	}
}
?>  
