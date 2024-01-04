$(document).ready(function(){
    const bntEditar = document.querySelectorAll('.bntEditar');
    const bntDesfazer = document.querySelectorAll('.fa-rotate-left');
    const bntExcluir = document.querySelectorAll('.bntExcluir');
    const bntCancelar = document.querySelectorAll('.bntCancelar');
    const bntSalvar = document.querySelectorAll('.bntSalvar');
    const resposta = document.getElementById('resposta');
    const botoesPadroes = $('.acoes');
    const tabelaUsuarios = $('#tabelaUsuarios');

    tabelaUsuarios.on('click', '.bntEditar', function () {
        const linha = $(this).closest('tr');
        const desativados = linha.find('.input-table');

        desativados.each(function () {
            $(this).removeAttr("disabled").removeClass('off');
        });

        const bntSalvarLinha = linha.find('.bntSalvar');
        const bntCancelarLinha = linha.find('.bntCancelar');
        const bntEditarLinha = linha.find('.bntEditar');
        const bntExcluirLinha = linha.find('.bntExcluir');
        const iconesSalvar = linha.find('.fa-rotate-left');

        bntEditarLinha.hide();
        bntExcluirLinha.hide();
        bntSalvarLinha.show();
        bntCancelarLinha.show();

        iconesSalvar.css('visibility', 'visible');
    });

    tabelaUsuarios.on('click', '.fa-rotate-left', function () {
        const linha = $(this).closest('tr');
        const inputs = linha.find('.input-table');

        inputs.each(function () {
            $(this).val($(this).prop('defaultValue'));
        });
    });

    tabelaUsuarios.on('click', '.bntExcluir', function () {
        const linha = $(this).closest('tr');
        const idUser = linha.find('.campo-idUser').text();

        if (idUser !== '') {
            $.ajax({
                url: '../PHP/atualizarUsers.php',
                type: 'POST',
                data: {
                  id: idUser,
                },
                dataType: "json",
                success: function(retorno) {
     
                  if(retorno == 'apagado'){
                      resposta.innerHTML = 'Excluido com sucesso';
                      setTimeout(function () {
                          location.reload();
                      }, 600)
                  }
                 
                  else{
                      resposta.innerHTML = 'Erro ao excluir';
                  }
     
                },
                error: function(error) {
                   //Lidar com erros na requisição ou resposta
                  console.error('Erro na requisição:', error);
                }
              });
        }
    });

    tabelaUsuarios.on('click', '.bntCancelar', function () {
        const linha = $(this).closest('tr');
        const inputs = linha.find('.input-table');
        const bntSalvarLinha = linha.find('.bntSalvar');
        const bntCancelarLinha = linha.find('.bntCancelar');
        const bntEditarLinha = linha.find('.bntEditar');
        const bntExcluirLinha = linha.find('.bntExcluir');
        const iconesSalvar = linha.find('.fa-rotate-left');

        inputs.each(function () {
            $(this).val($(this).prop('defaultValue'));
        });

        inputs.attr('disabled', true).addClass('off');

        bntEditarLinha.show();
        bntExcluirLinha.show();
        bntSalvarLinha.hide();
        bntCancelarLinha.hide();

        iconesSalvar.css('visibility', 'hidden');

        resposta.innerHTML = '';
    });

    tabelaUsuarios.on('click', '.bntSalvar', function () {
        console.log('Clicou em Salvar');
    
        const linha = $(this).closest('tr');
        const campos = linha.find('.input-table');
    
        const dados = {};
    
        campos.each(function () {
            const chave = $(this).attr('class').replace('input-table campo-', ''); // Extrai a classe relacionada ao campo
            const valor = $(this).prop('tagName') === 'H1' ? $(this).text() : $(this).val();
            dados[chave] = valor;
        });
    
        console.log('Dados a serem salvos:', dados);
    
        // Adicione um log para verificar se chegou a este ponto no código
        console.log('Antes da requisição AJAX');
    
        $.ajax({
            url: '../PHP/atualizarUsers.php',
            type: 'POST',
            data: {
                dado: dados,
            },
            dataType: 'json',
            success: function (retorno) {
                console.log('Resposta do servidor:', retorno);
    
                if (retorno == 'atualizado') {
                    resposta.innerHTML = 'Dados atualizados com sucesso';
                    setTimeout(function () {
                        location.reload();
                    }, 600);
                } else {
                    resposta.innerHTML = 'Erro ao salvar os dados';
                }
            },
            error: function (error) {
                console.error('Erro na requisição:', error);
            }
        });
    
        // Adicione um log para verificar se esta parte do código é alcançada
        console.log('Após a requisição AJAX');
    });

    $('#debug').on("click", function () {
        $.ajax({
            url: '../PHP/atualizarUsers.php',
            type: 'POST',
            data: {
                gerar: 'sim',
            },
            dataType: "json",
            success: function(retorno) {
   
            if(retorno == 'gerado'){
                resposta.innerHTML = 'Gerado com sucesso';
                setTimeout(function () {
                    location.reload();
                }, 600)
            }
               
            else{
                resposta.innerHTML = 'Erro ao Gerar usuários';
            }
   
            },
            error: function(error) {
                //Lidar com erros na requisição ou resposta
                console.error('Erro na requisição:', error);
            }
        });
      });

    $('#ordem').on('change', function () {
        const ordem = $(this).val();
        const tabela = $('#tabelaUsuarios');

        // Obtemos as linhas da tabela
        const linhas = tabela.find('tr').get();

        // Ordenamos as linhas com base na seleção do usuário
        linhas.sort(function (a, b) {
            const valorA = $(a).find('.campo-idUser').text();
            const valorB = $(b).find('.campo-idUser').text();

            // Use parseInt para garantir que a ordenação seja numérica
            return (ordem === 'crescente') ? parseInt(valorA, 10) - parseInt(valorB, 10) : parseInt(valorB, 10) - parseInt(valorA, 10);
        });

        // Adicionamos as linhas ordenadas de volta à tabela
        tabela.empty().append(linhas);

    });

    $('#search').on('click', function () {
        const tipo = $('#buscaTipo').val();
        const procura = $('#procurar').val();

        if(procura == "" || tipo == "selecione"){
            location.reload();
        }

        $.ajax({
            url: '../PHP/atualizarUsers.php',
            type: 'POST',
            data: {
                tipo: tipo,
                procura: procura,
            },
            dataType: 'json',
            success: function (usuarios) {
                // Limpar a tabela
                $('#tabelaUsuarios').empty();

                // Adicionar os resultados da busca à tabela
                usuarios.forEach(function (usuario) {
                    // Criar uma nova linha para cada usuário e adicionar à tabela

                    const newRow = $('<tr>');
                    newRow.append('<td>' + '<h1 class="input-table campo-idUser" id="input-idUser">' + usuario.idUser + '</h1>' + '</td>');
                    newRow.append('<td>' + '<input class="input-table off campo-cargo" id="input-cargo" type="text" value="' + usuario.cargo + '" placeholder="Insira os dados" maxlength="5" disabled oninput="validateInputText(this)">' + '<i class="fa-solid fa-rotate-left"></i>' + '</td>');
                    newRow.append('<td>' + '<input class="input-table off campo-login" id="input-login" type="text" value="' + usuario.login + '" placeholder="Insira os dados" maxlength="6" disabled oninput="validateInputText(this)">' + '<i class="fa-solid fa-rotate-left"></i>' + '</td>');
                    newRow.append('<td>' + '<input class="input-table off campo-senha" id="input-senha" type="text" value="' + usuario.senha + '" placeholder="Insira os dados" maxlength="8" disabled oninput="validateInputText(this)">' + '<i class="fa-solid fa-rotate-left"></i>' +  '</td>');
                    newRow.append('<td>' + '<input class="input-table off campo-cep" id="input-cep" type="text" value="' + usuario.cep + '" placeholder="Insira os dados" maxlength="9" disabled oninput="validateInputNumbers(this)">' + '<i class="fa-solid fa-rotate-left"></i>' + '</td>');
                    newRow.append('<td>' + '<input class="input-table off campo-nomeMae" id="input-nomeMae" type="text" value="' + usuario.nomeMae + '" placeholder="Insira os dados" disabled oninput="validateInputText(this)">' + '<i class="fa-solid fa-rotate-left"></i>' + '</td>');
                    newRow.append('<td>' + '<input class="input-table off campo-DTnascimento" id="input-DTnascimento" type="date" value="' + usuario.DTnascimento + '" placeholder="Insira os dados" disabled>' + '<i class="fa-solid fa-rotate-left"></i>' + '</td>');
                    newRow.append('<td class="acoes">' + '<input class="bntEditar" type="button" value="Editar">' + '<input class="bntExcluir" type="button" value="Excluir">' + '<input class="bntSalvar" type="button" value="Salvar">' + '<input class="bntCancelar" type="button" value="Cancelar">' +  '</td>');

                    $('#tabelaUsuarios').append(newRow);
                });

                // Exibir os botões padrões
                botoesPadroes.show();
            },
            error: function (error) {
                console.error('Erro na requisição:', error);
            }
        });
    });

    function Erro(input, message) {
        const formControl = input.parent();
        const small = formControl.find('small');
    
        //Adiciona a mensagem de erro
        small.text(message);
    
        //Adiciona a classe de erro
        formControl.removeClass('sucesso').addClass('erro');
      }
      //função de adicionar sucesso
  
      function Sucesso(input, message) {
        const formControl = input.parent();
        const small = formControl.find('small');

        small.text(message);
    
        // Adiciona a classe de sucesso
        formControl.removeClass('erro').addClass('sucesso');
      }

});