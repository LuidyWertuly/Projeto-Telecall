$(document).ready(function(){

  const verificar = $('#verication');

  //Mudar Perguntas

  const numeroaleatorio = Math.floor(Math.random() * 3) + 1;

  if (numeroaleatorio == 1) {

    $('#pergunta').html('Insira a data de nascimento usada no registro');
    verificar.attr("type", "date");

  }
  else if (numeroaleatorio == 2) {

    $('#pergunta').html('Insira o nome da sua mãe usado no registro');
    verificar.attr("type", "text");

  }
  else {

    $('#pergunta').html('Inira o CEP usado no registro');
    verificar.attr("type", "text");

  }
  //Verificar 

    verificar.on('blur', checkStorage);

    $('#verificar-bnt').on('click', function(){

        checkStorage()

    });

    function checkStorage(){

      validadorCondicoes = true
      const verificarValue = verificar.val();

      if(verificarValue === ''){
        validadorCondicoes = false
        Erro(verificar, 'Obrigatório');
      }

      else{
        Sucesso(verificar);
      }
      if(validadorCondicoes == true && event.target.id === "verificar-bnt"){
        $.ajax({
          url: '../PHP/validarUser.php',
          type: 'POST',
          data: {
            informacao: verificarValue,
            numero: numeroaleatorio,
          },
          dataType: "json",
          success: function(retorno) {

            // Lidar com a resposta bem-sucedida do servidor

            if(retorno.resultado == 'valido'){
              if(retorno.alterar == 'alterar'){
                setTimeout(function () {
                  window.location.href = "../Pages/alterarSenha.php";
                }, 500);
              }
              else{
                setTimeout(function () {
                  window.location.href = "../index.php";
                }, 500);
              }
            }
            
            else{

              Erro(verificar, "dado Incorreto");

            }

          },
          error: function(error) {
            // Lidar com erros na requisição ou resposta
            console.error('Erro na requisição:', error);
          }
        });
      }

    }

    function Erro(input, message) {
      const formControl = input.parent();
      const small = formControl.find('small');
  
      //Adiciona a mensagem de erro
      small.text(message);
  
      //Adiciona a classe de erro
      formControl.removeClass('sucesso').addClass('erro');
    }
    //função de adicionar sucesso

    function Sucesso(input) {
      const formControl = input.parent();
  
      // Adiciona a classe de sucesso
      formControl.removeClass('erro').addClass('sucesso');
    }

});
