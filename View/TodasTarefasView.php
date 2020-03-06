<?php
    require_once "../Controller/RecuperaTarefasController.php";
    session_start();

    $usuario = $_SESSION['usuario'];

    $recuperaTarefas = new RecuperaTarefasController();
    //Exibirá todas as tarefas
    $tarefas = $recuperaTarefas->recuperaTarefas($usuario);

?>

<table class="table table-borderless">
    <thead>
      <tr>
        <th class="text-success" scope="col"><h3>Todas As Tarefas</th>
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

            //HTML de uma tarefa concluída
            $tarefaConcluidaHTML = '
                <tr id="' . $tarefa->id . '">    <!--id de cada elemento será a id no banco de dados-->
                    <td>' . $tarefa->descricaoTarefa  . ' (Concluido)</td>
                    <td>
                        <a onclick="removeTarefa(' . $tarefa->id . ')">
                            <i class="fas fa-trash-alt" style="color: red;"></i>
                        </a>
                    </td>
                    <td>
                        <a>
                        </a>
                    </td>
                    <td>
                        <a>
                        </a>
                    </td>
                </tr>
                ';    

                if(!$tarefa->concluida) //Se a tarefa não foi concluída, desenha os ícones de edição e de conclusão
                    echo $tarefaNaoConcluidaHTML;
                else
                    echo $tarefaConcluidaHTML;

        }
        ?>
    </tbody>
  </table>