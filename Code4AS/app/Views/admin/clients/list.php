<h1><?=$title?></h1>

<div class="col-md-12">
    <form method="GET" action="<?=base_url("admin/clients/")?>" 
    enctype="multipart/form-data">  
    <div class="form-group">
        <label form="nome">Nome</label>
        <input type="text" class="form-control col-md-4" name="nome">
    </div>
    
        <button type="submit" class="btn btn-primary col-md-2">Procurar</button>
    </form>
</div>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Ações</th>
        <th>Editar/Deletar</th>
    </tr>
    <?php foreach($clients as $client):?>
        <tr>
            <td> <?=$client['idCliente']?> </td>
            <td> <?=$client['nome']?> </td>
            <td> <a href="<?=base_url('admin/clients/'.$client['idCliente'])?>">Detalhes</a> </td> 
            <td>
            <a class="btn btn-warning" href="<?=base_url("admin/clients/update/{$client['idCliente']}")?>">Editar</a>
            <a class="btn btn-danger" href="<?=base_url("admin/clients/delete/{$client['idCliente']}")?>">Deletar</a>  
            </td>

        </tr>
    <?php endforeach; ?>

</table>

