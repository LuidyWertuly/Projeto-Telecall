<!DOCTYPE html>
<html lang="pt-br">
   <body>
      <header>
         <div class="/-link">
            <a href="../index.php">
               <img src="../image/mini-logo.png">
            </a>
         </div>
            <nav>
               <button id="bnt-mobile" onclick="openmenu()"><i class="fa fa-bars"></i></button>
               <div class="menu" id="menu">
                  <div class="sub-menu">
                     <button id="menu-text" onclick="OpenSubMenu()">Funcionalidades </button>
                     <i id="icone-sub-menu" class="fa fa-caret-down"></i>
                     <div class="content-sub-menu" id="content-sub-menu">
                        <a href="./2fa.php">Autenticação de dois fatores</a>
                        <a href="./numero-mascara.php">Número Máscara</a>
                        <a href="./google-chamadas-verificadas.php">Chamadas verificadas do Google</a>
                        <a href="./sms-Programavel.php">SMS Programável</a>
                     </div>
                  </div>
                  <a href="./modelo-BD.php" id="modeloBD">Modelo BD</a>
                  <a href="./usuarios.php" id="users">Usuários</a>
                  <a href="./registro.php" id="registrar" >Registre-se</a>
                  <a href="./login.php" id="entrar">Entrar</a>
                  <div class="menu-conta">
                     <button id="logado" onclick="OpenMenuConta()"><i class="fa-solid fa-user-large"></i></button>
                     <i id="icone-conta" class="fa fa-caret-down"></i>
                     <div class="logado-content" id="logado-content">
                        <p id="username">username</p>
                        <a href="../PHP/logout.php" id="sair">Sair Da Conta</a>
                     </div>
                  </div>
                  <button id="bnt-darkmode" onclick="darkmode()"><i class="fa-solid fa-circle-half-stroke"></i></button>
                  <button id="btnAumentar">A+</button>
                  <button id="btnDiminuir">A-</button>
               </div>
            </nav>
      </header>

   </body>
</html>