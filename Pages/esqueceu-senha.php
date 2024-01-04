<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <link href="../CSS/Style(esq-senha).css" rel="Stylesheet" type="text/css"/>
      <script src="../JS/esqueceuSenha.js" type="text/JavaScript"></script>
      <title>Esqueceu senha</title>
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>

      <section class="esq-senha">
         <a href="../index.php">
            <img src="../image/logorecortsm.png" />
         </a>
         <form>
            <div class="info">
               <h1>Recuperar senha</h1>
               <p>Digite o login que você usou para registrar-se.</p>
            </div> <!--info-->
            <div class="inserir">
               <div class="inputcontrol">
                  <input type="text" placeholder="Digite o Seu Login" id="recuperarSenha" oninput="validateInput(this)" />
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>
               <input type="button" value="Enviar" id="bntEnviar" />
            </div>
            </div> <!--inserir-->
         </form>
      </section> <!--esq-senha-->

      <?php include '../Assets/footer.php'; ?>

   </body>
</html>