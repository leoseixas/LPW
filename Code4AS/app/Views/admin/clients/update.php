<h2>Ediart Cliente</h2>

<form method="POST" action="<?=base_url("admin/clients/update-action/{$client['idCliente']}")?>" 
enctype="multipart/form-data">
    <div class="form-group">
        <label form="idCliente">Id</label>
        <input type="text" class="form-control col-md-2" name="idCliente" value="<?= $client['idCliente']?>" readonly="readonly">
    </div>
    <div class="form-group">
        <label form="nome">Nome</label>
        <input type="text" class="form-control col-md-4" name="nome" value="<?= $client['nome']?>" >
    </div>
    <div class="form-group">
        <label form="email">Endereço</label>
        <input type="mail" class="form-control col-md-4" name="email" value="<?= $client['endereco']?>">
    </div>
    <div class="form-group">
        <label form="telefone">E-mail</label>
        <input type="text" class="form-control col-md-4" name="telefone" value="<?= $client['email']?>">
    </div>
    <div class="form-group">
        <label form="endereco">Telefone</label>
        <input type="text" class="form-control col-md-4" name="endereco" value="<?= $client['telefone']?>">
    </div>

  <button type="submit" class="btn btn-primary">Salvar</button>
</form>