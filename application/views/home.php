<!DOCTYPE html>
<html>
<head>
	<title>Registro RPM</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('libs/css/style.css'); ?>">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('libs/js/jquery.mask.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('libs/js/home.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div id="content-home">
				<form method="POST" action="<?php echo base_url('home/index'); ?>" id="form-rpm">
					<h2>Registro</h2>
					<?php echo validation_errors(); ?>
					<?php echo form_open('form'); ?>
					<?php if($this->session->flashdata('success')): ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
						<?php elseif($this->session->flashdata('error')): ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $this->session->flashdata('error') ?>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<label><b class="require">* </b> Nome</label>
							<input type="text" name="nome" class="form-control">
						</div>
						<div class="form-group">
							<label><b class="require">* </b> Email</label>
							<input type="email" name="email" class="form-control">
						</div>	
						<div class="form-group">
							<label><b class="require">* </b> Senha</label>
							<input type="password" name="senha" id="senha" class="form-control">
						</div>
						<div class="form-group">
							<label><b class="require">* </b> Confirmar Senha</label>
							<input type="password" name="confsenha" class="form-control">
						</div>
						<div class="form-group">
							<label><b class="require">* </b>CEP</label>
							<input type="text" name="cep" id="cep" class="form-control">
						</div>
						<div class="form-group">
							<label><b class="require">* </b>Rua</label>
							<input type="text" name="rua" id="rua" class="form-control">
						</div>
						<div class="form-group">
							<label><b class="require">* </b>Bairro</label>
							<input type="text" name="bairro" id="bairro" class="form-control">
						</div>
						<div class="form-group">
							<label><b class="require">* </b>Cidade</label>
							<input type="text" name="cidade" id="cidade" class="form-control">
						</div>
						<div class="form-group">
							<label><b class="require">* </b> Estado</label>
							<input type="text" name="estado" id="estado" class="form-control">
						</div>
						<div class="form-group">
							<label><b class="require">* </b> Telefone</label>
							<input type="text" name="telefone" id="telefone" class="form-control">
						</div>
						<div class="form-group">
							<label>RG</label>
							<input type="text" name="rg" id="rg" class="form-control">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
					<script type="text/javascript">
						$("#cep").mask('00000-000');
						$("#cep").blur(function(){
							var cep = $("#cep").val();
							$.ajax({
								type:"GET",
								url: "https://viacep.com.br/ws/"+cep+"/json/",
								success: function(data) {
									$(data).each(function(index,value){
										$("#rua").val(value.logradouro);
										$("#bairro").val(value.bairro);
										$("#cidade").val(value.localidade);
										$("#estado").val(value.uf);
									})
								},
								error: function(e) {
									console.log(e);
								}
							})
						})
					</script>
				</div>
			</div>
		</div>
	</body>
	</html>