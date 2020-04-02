<h2>Cadastro do cliente</h2>
<form method="POST" action="?c=c&a=cca">
    <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control col-md-4" placeholder="Nome">
    </div>
    <div class="form-group">
        <label>Login</label>
        <input type="text" class="form-control col-md-4" placeholder="login">
    </div>

    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optradio">Masculino
        </label>
        </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optradio">Feminino
        </label>
    </div>
    <div class="form-group col-md-4">
        <label for="comment">Comentario</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>

    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <div class="form-group col-md-4">
        <label for="sel1">Opções</label>
        <select class="form-control" id="sel1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>