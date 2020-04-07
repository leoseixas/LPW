<h1>Lista de Usuarios</h1>

<table class='table table-hover table-bordered'>
    <tr>

        <th>nome</th>
        <th>login</th>
        <th>Senha</th>
    </tr>

    <?php
    foreach ($arrayUsers as $Users){
    ?>
        <tr>

            <td><?=$Users["nome"]?></td>
            <td><?=$Users["login"]?></td>
            <td><?=$Users["senha"]?></td>
            
        </tr>
    <?php
    }
    ?>
    
</table>