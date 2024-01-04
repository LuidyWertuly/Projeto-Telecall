$(document).ready(function(){

    const senha = $('#novaSenha');

    const confirmarSenha = $('#confirmNovaSenha');

    const alterar = $('#bntAlterar');

    //Verificar 
  
    senha.on('blur', checkStorage);
    confirmarSenha.on('blur', checkStorage);
  
    alterar.on('click', function(){
  
        checkStorage()
  
    });
  
    function checkStorage(){
  
        validadorCondicoes = true
        const senhaValue = senha.val();
        const confirmarSenhaValue = confirmarSenha.val();
  
          if (senhaValue === "") {
            Erro(senha, "Obrigatório");
            validadorCondicoes = false;
          } 
          
          else if (!validarSenha(senhaValue)) {
            Erro(senha, "A senha deve conter 8 letras");
            validadorCondicoes = false;
          } 
          
          else {
            Sucesso(senha, '');
          }
      
          if (confirmarSenhaValue === "") {
            Erro(confirmarSenha, "Obrigatório");
            validadorCondicoes = false;
          } 
          
          else if (confirmarSenhaValue !== senhaValue) {
            Erro(confirmarSenha, "As senhas não são iguais");
            validadorCondicoes = false;
          } 
          
          else {
            Sucesso(confirmarSenha, '');
          }

        if(validadorCondicoes == true && event.target.id === "bntAlterar"){
          $.ajax({
            url: '../PHP/mudarSenha.php',
            type: 'POST',
            data: {
              novaSenha: senhaValue,
            },
            dataType: "json",
            success: function(retorno) {
  
              if(retorno == 'correto'){
                Sucesso(senha, 'Senha alterada com sucesso');
                Sucesso(confirmarSenha, 'Senha alterada com sucesso');
                setTimeout(function () {
                    window.location.href = "../index.php";
                }, 600);

              }
              
              else{
                Erro(senha, "Erro ao alterar sua senha");
                Erro(confirmarSenha, "Erro ao alterar sua senha");
              }
  
            },
            error: function(error) {
              // Lidar com erros na requisição ou resposta
              console.error('Erro na requisição:', error);
            }
          });
        }
  
      }

      function validarSenha(senha) {
        // Verifica se a senha tem menos de 8 caracteres
        if (senha.length < 8) {
          return false;
        }
    
        // Verifica se a senha contém caracteres que não são letras
        if (/[^a-zA-Z]/.test(senha)) {
          return false;
        }
    
        // Se chegou aqui, a senha é válida
        return true;
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
  
      function Sucesso(input, message) {
        const formControl = input.parent();
        const small = formControl.find('small');

        small.text(message);
    
        // Adiciona a classe de sucesso
        formControl.removeClass('erro').addClass('sucesso');
      }
  
  });
  