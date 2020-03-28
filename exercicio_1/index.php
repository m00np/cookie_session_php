<?php
if(isset($_COOKIE['usuario']) && isset($_GET['deslogar'])){ //se existir o cookie usuario e o getdeslogar for true 
	unset($_COOKIE['usuario']); // retirar cookie
	echo '<script>alert("deslogado com sucesso!")</script>'; // mensagem de alerta 
} 

if(isset($_POST['nome'])){ 
	setcookie('usuario', $_POST['nome'], time()+86400); // duraçao um dia
	header("location: index.php"); // voltar p index
}else{ // se n ver nenhum dado p formulario
	if(!isset($_COOKIE['usuario'])){ 

		?>
<form method="POST" action="index.php">
Para continuar, precisamos confirmar se seu nome condiz com nossos dados na database. Digite seu nome abaixo:<br>
  <input type="text" id="nome" name="nome" placeholder="Nome"><br>
  <input type="submit" value="Acessar">
</form> 

<?php
	}else{ // se existir cookie
        echo "<center><h4>Seu nome condiz com a database, pode acessar!</h4><br>";
        echo "<h2>Bem vindo, " . $_COOKIE['usuario'] . "</h2>";
        echo "<h3> acesso liberado por um dia </h3>"; 
		echo "<br> <a href='?deslogar=true'><button>Deslogar</button></a></center>"; // botão p deslogar
	}
}
?>  