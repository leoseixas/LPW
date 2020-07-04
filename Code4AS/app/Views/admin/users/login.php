<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container-fluid" style="vertical-align: center">
        
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-5" id="login" >
                <h1>Login no Sistema</h1>
                <form action="<?=base_url('admin/validate-login')?>" method="POST" name="formulario" id="formulario">
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" class="form-control" name="login" placeholder="Digite o usúario">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" name="pass" placeholder="Digite sua senha">
                    </div>
                    <input class="btn btn-primary" type="submit" name="Enviar" value="Fazer Login">
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>