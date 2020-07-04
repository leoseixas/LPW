<h1><?=$title?></h1>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <?php foreach($clients as $client):?>
        <tr>
            <td> <?=$client['idCliente']?> </td>
            <td> <?=$client['nome']?> </td>
            <td> <a href="<?=base_url('clients/'.$client['idCliente'])?>">Detalhes</a> </td> 
        </tr>
    <?php endforeach; ?>

</table>