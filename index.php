<!doctype html>
<html lang="pt-br" dir="ltr">
<head>
	<title>Gestão de Competências</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="./Login/login.css">

</head>
<body>
	<header>
		<form id="login-form" action="#" method="POST" class="signin-form">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section"></h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-7 col-lg-5">
						<div class="wrap">
							<div class="img" style="background-image: url(Imagens/logo_sead.jpg);"></div>
							<div class="login-wrap p-4 p-md-5">
								<div class="d-flex">
									<div class="w-100">
										<h3 class="mb-4">Acesse a sua conta</h3>
									</div>
								</div>
								<div class="form-group mt-3">
									<input type="text" id="username" name="username" class="form-control" required>
									<label class="form-control-placeholder" for="username">Usuário</label>
								</div>
								<div class="form-group">
									<input id="password" type="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">Senha</label>
								</div>
								<div class="form-group">
									<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Entrar</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Lembrar de mim
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Esqueci minha senha</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</header>

	<script src="./Login/login.js"></script>
</body>
</html>

