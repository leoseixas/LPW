<h1>Lista de Clientes</h1>
<table class='table table-hover table-bordered'>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>Imagem</th>
        <th>Editar/Deletar</th>
    </tr>
<?php
foreach ($arrayClients as $client) {
?>
    <tr>
        <td><?=$client["idCliente"]?></td>
        <td><?=$client["nome"]?></td>
        <td><?=$client["email"]?></td>
        <td><?=$client["endereco"]?></td>
        <td><?=$client["telefone"]?></td>
        <td>
            <?php
                if(is_file('assets/img/'.$client["idCliente"]. '.jpg'))
            {?>
                <a href="assets/img/"<?=$client["idCliente"]?>.jpg>
                    <img style="max-width: 100px; max-height: 100px;" 
                    src="assets/img/<?=$client["idCliente"]?>.jpg">
                </a>
                <br>
                <a href="?c=c&a=lfc&id=<?=$client["idCliente"]?>">Arquivos</a>
            <?php
            }else{?>
                
                    Sem foto <br>
                    <a href="?c=c&a=lfc&id=<?=$client["idCliente"]?>">Arquivos</a>
                
            <?php
            } ?>
        </td>
        <td>
            <a class="btn btn-warning" href="?c=c&a=ecf&id=<?=$client["idCliente"]?>">Editar</a>
            <a class="btn btn-danger" href="?c=c&a=dc&id=<?=$client["idCliente"]?>">Deletar</a>
        </td>
    </tr>
<?php
}
?>

</table>