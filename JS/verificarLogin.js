$(document).ready(function() {
    // Fazer uma requisição AJAX para o arquivo PHP usando POST

    if (window.location.href.endsWith("index.php")) {
        var caminho = './PHP/verificarLogin.php';
    }
    else{
        var caminho = '../PHP/verificarLogin.php';
    }

    $.ajax({
        url: caminho,
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            // Receber os dados e atribuir às variáveis
            var valido = data.valido;
            var nome = data.nome;
            var cargo = data.cargo

            // Utilizar os dados como necessário
            if (valido == 'sim') {
                $("#entrar").css("display", "none");
                $("#registrar").css("display", "none");
                $("#username").html(nome);
                $("#logado").css("display", "block");
                if (window.innerWidth <= 768) {
                    $("#icone-conta").css("display", "block");
                }
                if(cargo == 1){
                    $("#esq-senha").css("display", "none");
                    $("#users").css("display", "block");
                }
                else{
                    $("#users").css("display", "none");
                }
            } else {
                $('#logado').css('display', 'none'); 
                $('#entrar').css('display', 'block');
                $('#registrar').css('display', 'block');
                $("#users").css("display", "none");
            }
        },
        error: function(error) {
            console.error('Erro na requisição AJAX:', error);
        }
    });
});