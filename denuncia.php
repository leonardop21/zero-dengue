<?php 
include('header.php');

if(isset($_COOKIE['zeroDengue_logged']) == 1 &&  isset($_COOKIE['zeroDengue_user'])): ?>

<div class="container" style="margin-top: 50px;">
	<div class="row">
		<div class="col-md-12 mx-auto d-block text-center">
			<img src="https://img2.gratispng.com/20180820/h/kisspng-yellow-fever-mosquito-dengue-fever-vector-portable-mosquito-png-clipart-png-mart-5b7b7730e56ff7.3800533615348180969398.jpg" class="img-fluid mx-auto d-block" width="200"><br>
			<small>Foto: gratispng.com</small>
			<h2>Bem-vindo <?php echo base64_decode($_COOKIE['zeroDengue_user']); ?></h2>
			<p>Realize sua denúncia sobre focos da dengue!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form method="post" action="/registrar-denuncia.php" enctype="multipart/form-data">
			  <div class="row">
				    <div class="col">
				      <input required="required" name="address" type="text" class="form-control" placeholder="Endereço do foco">
				    </div>
				    <div class="col">
				      <input required="required" name="photo" type="file" class="form-control">
				    </div>
				</div>
			  <div class="row">
			  	<div class="col">
			  		<textarea required="required" rows="10" cols="10" class="form-control" placeholder="Digite sua mensagem" name="reclamation"></textarea> 
			 	</div>
			  	
			  </div>
			  <div class="row">
			  	<input type="submit" value="Cadastrar no Zer@Dengue" class="btn btn-info mx-auto d-block">
			  </div>
			</form>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>



<?php 
else: 
	header('Location: /');
endif;