<?php 

if(isset($_COOKIE['zeroDengue_logged']) == 1 &&  isset($_COOKIE['zeroDengue_user']) && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>

<?php include('db.php'); ?>

<?php 

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["photo"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}





include('db.php');

	$address      		= $_POST['address'];
	$photo     	   		= 'upload/' . $_FILES["photo"]["name"];
	$reclamation   		= $_POST['reclamation'];
	$number_compaint 	=  rand(5000,50000);
	$getEmail 			= base64_decode($_COOKIE['zeroDengue_email']);

$pdo = new PDO($dsn, $dbuser, $dbpass);	

$consulta = $pdo->query("SELECT id FROM users WHERE email LIKE '$getEmail';");

$idUser = $consulta->fetch(PDO::FETCH_ASSOC);


try{

	$data = [
		'user_id' => $idUser['id'],
		'address' => $address,
	    'photo' => $photo,
	    'reclamation' => $reclamation,
	    'number_compaint' => $number_compaint
	];

		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		$sql = "INSERT INTO complaints (user_id, address, photo, reclamation, number_compaint) VALUES(:user_id, :address, :photo, :reclamation, :number_compaint)";
		  
		$stmt= $pdo->prepare($sql);

		$stmt->execute($data);

		 if ($stmt->rowCount() > 0) {
		 	echo "Denuncia registrada com sucesso.";
		 	header('Location: /obrigado.php/');
		 } else {
		 	echo "Ocorreu um erro com o seu cadastro. Por favor, tente novamente mais tarde";
		 }
	}catch(PDOException $e){
	echo "Não foi possível estabelcer uma conexão com o banco de dados". $e->getMessage();
	}
 
else: 
	header('Location: /');
endif;