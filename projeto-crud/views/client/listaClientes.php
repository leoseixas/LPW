<h1>Lista de Clientes</h1>

<table class="table">
    <tr>
        <th>Código</th>
        <th>nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Endereço</th>
    </tr>

    <?php
    foreach ($arrayClientes as $cliente){
    ?>
        <tr>
            <td><?=$cliente["idCliente"]?></td>
            <td><?=$cliente["nome"]?></td>
            <td><?=$cliente["endereco"]?></td>
            <td><?=$cliente["email"]?></td>
            <td><?=$cliente["telefone"]?></td>
        </tr>
    <?php
    }
    ?>
    
</table>