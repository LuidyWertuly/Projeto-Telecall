<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <link href="../CSS/alterarSenha.css" rel="Stylesheet" type="text/css"/>
      <script src="../JS/alterarSenha.js" type="text/JavaScript"></script>
      <title>Alterar Senha</title>
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>

      <section class="altSenha">
         <a href="../index.php">
            <img src="../image/logorecortsm.png" />
         </a>
         <form>
               <h1>Criar nova senha</h1>
               <div class="lado">
                <div class="inputcontrol" id="lado-a-lado">
                        <label for="novaSenha">Digite a nova senha</label>
                        <input type="password" placeholder="Digite a senha" id="novaSenha" oninput="validateInput(this)" maxlength="8"/>
                        <span class="fa-regular fa-eye olho" onclick="toggleSenha('novaSenha')"></span>
                        <i class="fas fa-exclamation-circle"></i>
                        <i class="fas fa-check-circle"></i>
                        <small>Erro</small>
                </div>

                <div class="inputcontrol" id="lado-a-lado">
                        <label for="confirmNovaSenha">Confirme a senha</label>
                        <input type="password" placeholder="Confirme a senha" id="confirmNovaSenha" oninput="validateInput(this)" maxlength="8"/>
                        <span class="fa-regular fa-eye olho" onclick="toggleSenha('confirmNovaSenha')"></span>
                        <i class="fas fa-exclamation-circle"></i>
                        <i class="fas fa-check-circle"></i>
                        <small>Erro</small>
                </div>
               </div>
               <input type="button" value="Alterar" id="bntAlterar" />
         </form>
      </section> <!--altSenha-->

      <?php include '../Assets/footer.php'; ?>

   </body>
</html>