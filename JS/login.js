$(document).ready(function () {
  //definindo variaveis
  
  const userLogin = $("#user-login");
  const senhaLogin = $("#senha-login");
  estado = "session";
  tipo = "user";

  //executando a função sempre que o input e desselecionado
  userLogin.on("blur", enviarDados);
  senhaLogin.on("blur", enviarDados); 

  $("#login-bnt").on("click", function () {
    enviarDados();
  });

  if ($("#lem-senha").is(':checked')) {
      estado = 'cookie'
  } 
  
  else {
      estado = 'session'
  }

  $("#lem-senha").change(function() {

    // Verifique se o checkbox está marcado
    if ($(this).is(':checked')) {

        estado = 'cookie'
    } 
    
    else {

        estado = 'session'
    }

    });

  if ($("#switch").is(':checked')) {
    tipo = 'admin'
  } 
  
  else {
    tipo = 'user';
  }

  $("#switch").change(function() {
    // Verifique se o checkbox está marcado
    if ($(this).is(':checked')) {
  
        tipo = 'admin'
    } else {
  
        tipo = 'user';
    }
  });

  function enviarDados() {
    var login = $("#user-login").val();
    var senha = $("#senha-login").val();
    validadorCondicoes = true;

      if (login == ""){
        Erro(userLogin, "Preencha o campo login");
        validadorCondicoes = false;
      } 

      else{
        Sucesso(userLogin);
      }

      if(senha == ""){
        Erro(senhaLogin, "Preencha o campo senha");
        validadorCondicoes = false;
      }

      else{
        Sucesso(senhaLogin);
      }
      
      if (validadorCondicoes === true && event.target.id === "login-bnt"){
        $.ajax({
          type: "POST",
          url: "../PHP/processarLogin.php",
          data: {
            login: login,
            senha: senha,
            estado: estado,
            tipo: tipo,
          },
          dataType: "json",
          success: function (resposta) {
            if(resposta.tipoCheck == 'true'){
              let Nlihas = parseInt(resposta.numLinhas);
              let Cargo = parseInt(resposta.userCargo);
              if (Nlihas > 0 && Cargo == 1) {
                Sucesso(userLogin);
                Sucesso(senhaLogin);
                  setTimeout(function () {
                    window.location.href = "../index.php";
                  }, 500);
              } 
              
              else if (Nlihas > 0 && Cargo == 0) {
                Sucesso(userLogin);
                Sucesso(senhaLogin);
                  setTimeout(function () {
                    window.location.href = "../Pages/verificacao-duas-etapas.php";
                  }, 500);          
              } 
            }

            else if(resposta.tipoCheck == 'false'){
              Erro(userLogin, "Login ou Senha Incorretos");
              Erro(senhaLogin, "Login ou Senha Incorretos");
            }

            else{
              const erro = document.getElementById('erro');
              erro.style.display = 'block';
              erro.innerHTML = 'O cargo selecionado <br/> não é compativel com seu login.'
            }
          },
        });
      }
  }

  

  //função de adicionar erro

  function Erro(input, message) {
    const formControl = input.parent();
    const small = formControl.find("small");

    //Adiciona a mensagem de erro
    small.text(message);

    //Adiciona a classe de erro
    formControl.removeClass("sucesso").addClass("erro");
  }
  //função de adicionar sucesso

  function Sucesso(input) {
    const formControl = input.parent();

    // Adiciona a classe de sucesso
    formControl.removeClass("erro").addClass("sucesso");
  }

});
