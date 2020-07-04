<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/styleAdmin.css')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Admin</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
           <nav class="col-md-12 navbar navbar-expand-md navbar-light">
           <a class="navbar-brand" href="<?=base_url('admin')?>">Leonardo Seixas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('admin')?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('admin/clients')?>">Listar Cliente</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('admin/clients/insert')?>">Adicionar</a>
                </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('admin/logout');?>">Sair</a>
                    </li> 
                    </ul>
                </div>             
            </nav>
            <section class="col-md-12">