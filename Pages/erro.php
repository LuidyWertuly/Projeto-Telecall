<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <link href="../CSS/Style(erro).css" rel="Stylesheet" type="text/css"/>
      <title>Erro</title>
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>

      <section class="container">
         <a href="../index.php">
            <img src="../image/logorecortsm.png" />
         </a>
         <div class="erro">
            <h1 id="teste1">Ops!</h1>
            <h3 id="teste2">Ocorreu um erro inesperado</h3>
            <p id="teste3">tente novamente mais tarde</p>
            <a href="../index.php">Voltar para o inicio</a>
         </div>
      </section>

      <?php include '../Assets/footer.php'; ?>

   </body>
</html>