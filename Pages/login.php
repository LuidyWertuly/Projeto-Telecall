<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <script src="../JS/login.js" type="text/JavaScript"></script>
      <link href="../CSS/Style(login).css" rel="Stylesheet" type="text/css"/>
      <title>Entrar</title>
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>

      <section class="login">
         <a href="../index.php">
            <img src="../image/logorecortsm.png" />
         </a>
         <form>
             
            <div class="switch">
               <label class="toggle-switch">
                  <input type="checkbox" id="switch">
                  <span class="slider" data-label-on="Admin" data-label-off="Usuário"></span>
              </label>
            </div>

            <p id="erro"></p>

            <div class="inputcontrol">
               <label for="user-login">Seu Login:</label> 
               <input type="text" placeholder="Login" id="user-login" autocomplete="off"/>
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small>
            </div>

            <div class="inputcontrol">
               <label for="senha-login">Sua Senha:</label> 
               <input type="password" placeholder="Senha" id="senha-login" autocomplete="off"/>
               <span class="fa-regular fa-eye olho" onclick="toggleSenha('senha-login')"></span>
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small>
            </div>

            <div class="lado">
               <div class="checkbox">
                  <input type="checkbox" id="lem-senha">
                  <label for="lem-senha" id="lem-senha">Lembrar Senha</label>
               </div> <!--checkbox-->
               <div class="limpar">
                  <input type="reset" id="bnt-limpar"  value="Limpar"/>
               </div><!--limpar-->
            </div>
            <input type="button" value="Entrar" id="login-bnt"/>
            <div class="links">
               <a href="esqueceu-senha.php" id="esq-senha">Esqueci Minha Senha</a>
               <a href="registro.php" id="register">Criar Nova Conta</a>
            </div> <!--links-->
         </form> <!--login-->
      </section>

      <?php include '../Assets/footer.php'; ?>

   </body>
</html>