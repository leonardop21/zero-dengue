<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


	include('db.php');

	$name      	  = $_POST['name'];
	$lastname     = $_POST['lastname'];
	$email     	  = $_POST['email'];
	$password     = md5($_POST['password']);
	$rg       	  = $_POST['rg'];
	$cpf          = $_POST['cpf'];
	$address      = $_POST['address'];
	$phone        = $_POST['phone'];
	$city         = $_POST['city'];
	$district     = $_POST['district'];
	$state        = $_POST['state'];


	try{

		$data = [
			'name' => $name,
		    'lastname' => $lastname,
		    'email' => $email,
		    'password' => $password,
		    'rg' => $rg,
		    'cpf' => $cpf,
		    'address' => $address,
		    'phone' => $phone,
		    'city' => $city,
		    'district' => $district,
		    'state' => $state
		];

		$pdo = new PDO($dsn, $dbuser, $dbpass);	
		 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$sql = "INSERT INTO users (name, lastname, email, password, rg, cpf, address, phone, city, district, state) VALUES(:name, :lastname, :email, :password, :rg, :cpf, :address, :phone, :city, :district, :state)";
		  
				$stmt= $pdo->prepare($sql);

				$stmt->execute($data);

				 if ($stmt->rowCount() > 0) {
				 	include('cookie.php');
				 	echo "Registro realizado com sucesso, iremos rediciona-lo para a pagina de denuncia";
				 	header('Location: /denuncia.php/');
				 } else {
				 	echo "Ocorreu um erro com o seu cadastro. Por favor, tente novamente mais tarde";
				 }
	}catch(PDOException $e){
	echo "Não foi possível estabelcer uma conexão com o banco de dados". $e->getMessage();
	}
} else {
	header('Location: /');
}