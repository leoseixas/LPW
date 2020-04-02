<h2>Ediart Cliente</h2>

<form method="POST" action="?c=c&a=ec">
    <div class="form-group">
        <label form="idCliente">Id</label>
        <input type="text" class="form-control col-md-2" name="idCliente" value="<?= $arrayClients['idCliente']?>" readonly="readonly">
    </div>
    <div class="form-group">
        <label form="nome">Nome</label>
        <input type="text" class="form-control col-md-4" name="nome" value="<?= $arrayClients['nome']?>" >
    </div>
    <div class="form-group">
        <label form="email">Endereço</label>
        <input type="mail" class="form-control col-md-4" name="email" value="<?= $arrayClients['endereco']?>">
    </div>
    <div class="form-group">
        <label form="telefone">E-mail</label>
        <input type="text" class="form-control col-md-4" name="telefone" value="<?= $arrayClients['email']?>">
    </div>
    <div class="form-group">
        <label form="endereco">Telefone</label>
        <input type="text" class="form-control col-md-4" name="endereco" value="<?= $arrayClients['telefone']?>">
    </div>


  <button type="submit" class="btn btn-primary">Salvar</button>
</form>