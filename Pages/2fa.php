<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <link href="../CSS/Style(2FA).css" rel="Stylesheet"  type="text/css"/>
      <title>2FA</title>
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>

      <section class="main">
         <div class="main-content">
            <h1>2FA - Autenticação de dois fatores</h1>
            <p>Amplie e fortaleça a segurança de seu negócio.</p>
            <a href="Precos.php"><button>Assine já</button></a>
         </div>
         <div class="image-main">
            <img src="../image/2fa-img-semfnd.png" alt=""/>
         </div>
      </section> <!--main-->

      <div class="divisor"></div>

      <section class="conteiner">
         <div class="image">
            <img src="../image/conteiner-img-removebg.png" alt="" />
         </div> <!--image-->
         <div class="content">
            <h2>O que é?</h2>
            <h3>Uma melhor segurança para a empresa e seus clientes.</h3>
            <p>O 2FA é um procedimento de segurança que garante que serão
               necessários 2 fatores únicos para liberação de uma ação. O
               primeiro fator é a senha que o usuário Cadastrou e o segundo pode ser
               autenticado via token, via detecção de impressão digital,
               reconhecimento facial, código enviado via sms, entre outros.</p>
         </div> <!--content-->
      </section> <!--conteiner-->

      <div class="divisor"></div>

       <section class="funciona">
         <h2>Como funciona o 2FA:</h2>
         <div class="lado">

            <div class="passo">
               <img id="img1" src="../image/laptop.png" alt="" />
               <p>Usuário acessa seu site ou aplicativo e digita a senha cadastrada para entrar em seu perfil ou completar uma transação.</p>
            </div> <!--passo-->

            <div class="passo">
               <img id="img2" src="../image/warning.png" alt="" />
               <p>A Telecall recebe a tentativa de login e solicita que o usuário insira seu número de telefone para autorizar o acesso.</p>
            </div> <!--passo-->

            <div class="passo">
               <img id="img3" src="../image/smartphone-pin.png" alt="" />
               <p>Após inserir seu número, a Telecall envia para o usuário por SMS ou chamada de voz um código PIN de uso único.</p>
            </div> <!--passo-->

            <div class="passo">
               <img id="img1" src="../image/laptop2.png" alt="" />
               <p>O usuário insere o código no site ou aplicativo para concluir o processo de verificação.</p>
            </div> <!--passo-->

         </div> <!--lado-->
      </section> <!--funciona-->

      <div class="divisor"></div>

      <section class="funcoes">
         <div class="content-funcoes">
            <h2>Principais funções do 2FA:</h2>
            <ul>
               <li id="margin"><span>Envie uma senha via SMS, voz ou e-mail para autenticação do usuário.</span></li>
               <li id="margin"><span>Adicione uma camada extra de segurança além da senha pessoal.</span></li>
               <li id="margin"><span>Redução casos de fraude e invasões e evite o acesso a dados por invasores.</span></li>
               <li id="margin"><span>Ofereça segurança aprimorada para seus clientes.</span></li>
               <li><span>API simples e de rápida implementação.</span></li>
            </ul>
         </div>
            <div class="image-funcoes">
               <img src="../image/2fa-funcoes.png" alt="" />
            </div>
      </section> <!--funcoes-->

      <?php include '../Assets/footer.php'; ?>

   </body>
</html>