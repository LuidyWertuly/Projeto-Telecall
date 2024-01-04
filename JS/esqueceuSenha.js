$(document).ready(function(){

    const recuperarSenha = $('#recuperarSenha');

    const bntEnviar = $('#bntEnviar');

    //Verificar 
  
      recuperarSenha.on('blur', checkStorage);
  
      bntEnviar.on('click', function(){
  
        checkStorage()
  
      });
  
      function checkStorage(){
  
        validadorCondicoes = true
        const recuperarSenhaValue = recuperarSenha.val();
  
        if(recuperarSenhaValue === ''){
          validadorCondicoes = false
          Erro(recuperarSenha, 'Obrigatório');
        }
  
        else{
          Sucesso(recuperarSenha);
        }
        if(validadorCondicoes == true && event.target.id === "bntEnviar"){
  
          $.ajax({
            url: '../PHP/recuperarSenha.php',
            type: 'POST',
            data: {
              dado: recuperarSenhaValue,
            },
            dataType: "json",
            success: function(retornoSenha) {
  
              let numeroLinhas = retornoSenha.numerolinhas;

              if(numeroLinhas > 0){
                setTimeout(function () {
                    window.location.href = "../Pages/verificacao-duas-etapas.php";
                }, 500);
  
              }
              
              else{
  
                Erro(recuperarSenha, "dado Incorreto");
  
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
  