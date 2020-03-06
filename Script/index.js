
            function validaCadastro(){
                if(($('#login').val() == '') || ($('#senha').val() == '')){
                        $('#mensagemErroCadastro').show() //Mostra mensagem: 'preencha todos os campos'
                        return false  //Impede o envio do cadastro
                    }
                 
            }

            $(document).ready(function() {
                let url = window.location.href

                if(url.includes('Erro=UsuarioExiste')){
                    $('#mensagemErro').html('<h1 id="tituloMensagemErro">O usuário já existe</h1>');
                    $("#tituloMensagemErro").show()
                    setTimeout(function(){
                        $("#tituloMensagemErro").slideUp('1000')
                    }, 3000)
                }
                
                else if(url.includes('Erro=UsuarioIncorreto')){
                    $('#mensagemErro').html('<h1 id="tituloMensagemErro">Login ou senha incorretos</h1>');
                    $("#tituloMensagemErro").show()
                    setTimeout(function(){
                        $("#tituloMensagemErro").slideUp('1000')
                    }, 3000)
                }

                else if(url.includes('sucesso')){
                    $('#mensagemErro').removeClass('bg-danger')
                    $('#mensagemErro').addClass('bg-success')

                    $('#mensagemErro').html('<h1 id="tituloMensagemErro">Usuário cadastrado com sucesso</h1>');
                    $("#tituloMensagemErro").show()
                    setTimeout(function(){
                        $("#tituloMensagemErro").slideUp('1000')
                    }, 3000)
                }
                
            })
            