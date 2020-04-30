<h2>Cadastar novo cliente</h2>

<form method="POST" action="?c=c&a=ad" enctype="multipart/form-data">
    <div class="form-group">
        <label form="nome">Nome</label>
        <input type="text" class="form-control col-md-4" name="nome">
    </div>
    <div class="form-group">
        <label form="email">E-mail</label>
        <input type="mail" class="form-control col-md-4" name="email">
    </div>
    <div class="form-group">
        <label form="telefone">Telefone</label>
        <input type="text" class="form-control col-md-4" name="telefone">
    </div>
    <div class="form-group">
        <label form="endereco">Endereço</label>
        <input type="text" class="form-control col-md-4" name="endereco">
    </div>
    <div class="form-group">
        <label form="img">Foto Cliente</label>
        <input type="file" class="form-control col-md-4" name="photo" size="40">
    </div>
    


  <button type="submit" class="btn btn-primary">Salvar</button>
</form>