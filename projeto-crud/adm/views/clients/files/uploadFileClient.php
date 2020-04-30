<h1>Inserir Novo Arquivo cliente</h1>
<form class="form-group" method="POST" action="?c=c&a=ufcs&id=<?=$idCliente?>" enctype="multipart/form-data">
    <label for="name">Arquivo:</label>
    <input type="file" name="file" class="form-control-file">
    <br>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>