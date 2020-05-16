<?php include('header.php'); ?>
<?php if(!isset($_COOKIE['zeroDengue_logged']) == 1 && !isset($_COOKIE['zeroDengue_user'])): ?>

<div class="container" style="margin-top: 50px;">
	<div class="row">
		<div class="col-md-12 mx-auto d-block text-center">
			<img src="https://img2.gratispng.com/20180820/h/kisspng-yellow-fever-mosquito-dengue-fever-vector-portable-mosquito-png-clipart-png-mart-5b7b7730e56ff7.3800533615348180969398.jpg" class="img-fluid mx-auto d-block" width="200"><br>
			<small>Foto: gratispng.com</small>
			<h2>Bem-vindo ao sistema Zer@Dengue</h2>
			<p>Faça seu cadastro e denúncie focos de dengue!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form method="post" action="cadastro.php">
			  <div class="row">
				    <div class="col">
				      <input required="required" name="name" type="text" class="form-control" placeholder="Nome">
				    </div>
				    <div class="col">
				      <input required="required" name="lastname" type="text" class="form-control" placeholder="Sobrenome">
				    </div>
				</div>
				<div class="row">
				    <div class="col">
				      <input required="required" name="rg" type="text" class="form-control" placeholder="RG">
				    </div>
				    <div class="col">
				      <input required="required" name="cpf" type="text" class="form-control" placeholder="CPF">
				    </div>
				</div>
				<div class="row">
				    <div class="col">
				      <input required="required" name="address" type="text" class="form-control" placeholder="Endereço">
				    </div>
				    <div class="col">
				      <input required="required" name="phone" type="text" class="form-control" placeholder="Telefone">
				    </div>
				</div>
				<div class="row">
				    <div class="col">
				      <input required="required" name="city" type="text" class="form-control" placeholder="Cidade">
				    </div>
				    <div class="col">
				      <input required="required" name="district" type="text" class="form-control" placeholder="Bairro">
				    </div>
				</div>
				<div class="row">
				    <div class="col">
				      <input required="required" name="state" type="text" class="form-control" placeholder="Estado">
				    </div>
				    <div class="col">
				      <input required="required" name="password" type="password" class="form-control" placeholder="Senha">
				    </div>
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<input required="required" name="email" type="email" class="form-control" placeholder="E-mail">
			 	</div>
			  	<div class="col checkbox">
			  		<input required="required" type="checkbox"> Aceito os termos & condições
			  	</div>
			  </div>
			  <div class="row">
			  	<input type="submit" value="Cadastrar no Zer@Dengue" class="btn btn-info mx-auto d-block">
			  </div>
			</form>
		</div>
	</div>
</div>
<?php else: ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h2>Olá, <?php echo base64_decode($_COOKIE['zeroDengue_user']); ?>!</h2>
				<h4>Obrigado por ter se registrado em nosso portal de denúncias. Faça uma denúncia <a href="/denuncia.php">clicando aqui</a></h4>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php include('footer.php'); ?>