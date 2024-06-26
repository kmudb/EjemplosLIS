<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
    <h2>Registro</h2>
    <form role="form" name="registro" action="php/registro.php" method="post">
        <div class="form-group">
		    <label for="username">Nombre de usuario</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
        </div>
        <div class="form-group">
		    <label for="fullname">Nombre Completo</label>
		    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
        </div>
        <div class="form-group">
		    <label for="email">Correo Electronico</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
        </div>
        <div class="form-group">
		    <label for="password">Contraseña</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
        </div>
        <div class="form-group">
		    <label for="confirm_password">Confirmar Contraseña</label>
		    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contraseña">
        </div>
        <button type="submit" class="btn btn-default">Registrar</button>
    </form>
</div>
</div>
</div>
<script src="js/valida_registro.js"></script>
</body>
</html>