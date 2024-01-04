<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <link href="../CSS/Style(calls).css" rel="Stylesheet"  type="text/css"/>
      <title>Chamadas verificadas</title>
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>

      <section class="main">
         <div class="main-content">
            <h1>Chamadas verificadas do google</h1>
            <p>Torne seu celular mais inteligente a respeito de gerenciamento de chamadas.</p>
            <a href="Precos.php"><button>Assine já</button></a>
         </div>
         <div class="image-main">
            <img src="../image/verified-calls.png" alt=""/>
         </div>
      </section> <!--main-->

      <div class="divisor"></div>

      <section class="conteiner">
         <div class="image">
            <img src="../image/verified-spam-removebg-preview.png" alt="" />
         </div> <!--image-->
         <div class="content">
            <h2>O que é?</h2>
            <h3>Chamadas verificadas.</h3>
            <p>Esse novo recurso do Google, exclusivo para
               telefones Android, permite que empresas exibam
               para o cliente na hora da chamada sua marca,
               logotipo e até mesmo o motivo da chamada.</p>
         </div> <!--content-->
      </section> <!--conteiner-->

      <div class="divisor"></div>

      <section class="funciona">
         <h2>Como funciona as chamadas verificadas:</h2>
         <div class="lado">

            <div class="passo">
               <img id="img1" src="../image/img-1-calls.png" alt="" />
               <p>Uma chamada telefônica de uma empresa assinante é feita para um cliente potencial ou existente.</p>
            </div> <!--passo-->

            <div class="passo">
               <img id="img2" src="../image/img-2-calls.png" alt="" />
               <p>Em nanossegundos, a solicitação é encaminhada para a plataforma da Telecall que processa a chamada e adiciona as informações verificadas antes de encaminhá-la ao destinatário. </p>
            </div> <!--passo-->

            <div class="passo">
               <img id="img3" src="../image/img-3-calls.png" alt="" />
               <p>As informações aparecem na tela do celular do recipiente que atenderá a ligação com uma chamada de voz normal. </p>
            </div> <!--passo-->

         </div> <!--lado-->
      </section> <!--funciona-->

      <div class="divisor"></div>

      <section class="funcoes">
         <div class="content-funcoes">
            <h2>Principais benefícios</h2>
            <ul>
               <li id="margin"><span>Estabeleça Confiança Pois Clientes são mais propensos a atender chamadas de organizações com os quais estão familiarizadas.</span></li>
               <li id="margin"><span>Agilize a Conexão Pois Quando o motivo da chamada é claro, a chance de o cliente atender é muito maior.</span></li>
               <li id="margin"><span>Melhore a Experiência do Cliente pois O nome da marca, logotipo e a visualização do motivo da chamada oferecem uma experiencia melhor e muito mais amigável para o cliente.</span></li>
               <li id="margin"><span>Aviso de problemas de fraude de cartão de crédito.</span></li>
               <li id="margin"><span>Aviso de atrasos e cancelamentos de voos.</span></li>
               <li id="margin"><span>Agendamentos de serviços, entregas, reparos e instalações.</span></li>
               <li id="margin"><span>Avisos sobre agendamentos, exames e resultados.</span></li>
               <li><span>Oferecer uma melhor experiência de vendas e promoções.</span></li>
            </ul>
         </div>
            <div class="image-funcoes">
               <img src="../image/google_calls-removebg-preview.png" alt="" />
            </div>
      </section> <!--funcoes-->

      <?php include '../Assets/footer.php'; ?>

   </body>
</html>