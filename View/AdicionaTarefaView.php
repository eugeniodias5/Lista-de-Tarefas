
<form class="mt-2 ml-3" action="../Controller/AdicionaTarefaController.php" method="POST">
    <div class="row">
        <div class="col">
            <h3 class="text-success">Adicionar Nova Tarefa</h3>
        </div>
    </div>

    <div class="row">
        <div class="col">
              <p> Descrição da tarefa: </p>

              <div class="input-group">
                <input class="form-control" name="tarefa" placeholder="Exemplo: Lavar o carro">
              </div>

              <div class="input-group mt-3">
                <button class="btn btn-success" type="submit">Cadastrar</button>
              </div>
        </div>
    </div>
</form>