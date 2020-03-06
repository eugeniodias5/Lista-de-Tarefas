function requisicaoAjax(url){
    $.ajax({
        url: url,
        type: 'POST',
        error: () => {alert('Aconteceu um erro! Tente novamente mais tarde.')},
        success: (dado) => {alert('dado')}
    })

}

function requisicaoAjax(url, id){
    //Requisição ajax com retorno
    $.ajax({
        url: url,
        type: 'POST',
        success: function(dado){
            console.log(dado)
            $('#' + id).html(dado)
        },
        error: () => {alert('Aconteceu um erro! Tente novamente mais tarde.')}
    })

}

function carregaTodasTarefas(){

    $('#tarefas-pendentes').removeClass('active')
    $('#nova-tarefa').removeClass('active')
    $('#todas-tarefas').addClass('active')

    requisicaoAjax('TodasTarefasView.php', 'tarefas')
}   

function carregaNovaTarefa(){

    $('#tarefas-pendentes').removeClass('active')
    $('#nova-tarefa').addClass('active')
    $('#todas-tarefas').removeClass('active')

    requisicaoAjax('AdicionaTarefaView.php', 'tarefas')
}

function carregaTarefasPendentes(){

    $('#tarefas-pendentes').addClass('active')
    $('#nova-tarefa').removeClass('active')
    $('#todas-tarefas').removeClass('active')

    requisicaoAjax('TarefasPendentesView.php', 'tarefas')
}

function removeTarefa(id){
    $('#' + id).remove()

    requisicaoAjax('../Controller/RemoveTarefaController.php?id=' + id)
}

function concluiTarefa(id){
    let tarefa = $('#' + id).html()

    requisicaoAjax('../Controller/ConcluiTarefaController.php?id=' + id)

    //Reescrevendo tarefa 
    let vetor = []
    vetor = tarefa.split("<td>")

    vetor[1] = vetor[1].replace("Pendente", "Concluido", vetor[1]);

    vetor = vetor[0] + '<td>' + vetor[1] + '<td>' + vetor[2]

    $('#' + id).html(vetor)
}