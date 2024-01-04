<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <link href="../CSS/Style(Verificacao-duas-etapas).css" rel="Stylesheet" type="text/css"/>
      <script src="../JS/verificacao.js" type="text/JavaScript"></script> 
      <title>Verificação em Duas Etapas</title>
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>

      <section class="verificar">
         <a href="../index.php">
            <img src="../image/logorecortsm.png" />
         </a>
         <form>

            <h2>Verificação em duas etapas</h2>

             <div class="inputcontrol">
               <label for="verication" id="pergunta">Pergunta</label>
               <input type="text" id="verication" name="verication" placeholder="Digite aqui"/>
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small>
            </div>

            <input type="button" value="Verificar" id="verificar-bnt"/>

         </form> <!--login-->
      </section>

      <?php include '../Assets/footer.php'; ?>

   </body>
</html>