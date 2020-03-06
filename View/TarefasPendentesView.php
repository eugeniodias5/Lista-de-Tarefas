<?php
    require_once "../Controller/RecuperaTarefasController.php";
    session_start();

    $usuario = $_SESSION['usuario'];

    $recuperaTarefas = new RecuperaTarefasController();
    //Exibirá apenas as tarefas não concluídas
    $tarefas = $recuperaTarefas->recuperaTarefasNaoConcluidas($usuario);

?>

<table class="table table-borderless">
    <thead>
      <tr>
        <th class="text-success" scope="col"><h3>Tarefas Pendentes</th>
      </tr>
    </thead>
    <tbody>

       <?php
       //Adicionando tarefas recuperadas do banco de dados
        foreach($tarefas as $tarefa){

            //HTML de uma tarefa não concluída
            $tarefaNaoConcluidaHTML = '
                <tr id="' . $tarefa->id . '">    <!--id de cada elemento será a id no banco de dados-->
                    <td>' . $tarefa->descricaoTarefa . ' (Pendente)</td>
                    <td>
                        <a onclick="removeTarefa(' . $tarefa->id . ')">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </a>
                    </td>
                    <td>
                        <a onclick="concluiTarefa(' . $tarefa->id . ')" >
                            <i class="fas fa-check-square" style="color: green;"></i>
                        </a>
                    </td>
                </tr>
                ';

                    echo $tarefaNaoConcluidaHTML;

        }
        ?>
    </tbody>
  </table>