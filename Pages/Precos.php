<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <link href="../CSS/Style(precos).css" rel="Stylesheet"  type="text/css"/>
      <title>Preços</title>      
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>
      
      <section class="preços">
         <div class="valores">
            <div class="container py-3">
               <div class="pricing-header p-3 pb-md-4 mx-auto text-center">

                  <h1 id="black" class="display-4 fw-normal text-body-emphasis"><span id="title">Preços</span></h1>
                  <p id="black" class="fs-5 text-body-secondary">Conheça nossos planos e serviços.</p>

               </div>
               <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">


               <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                      <h4 class="my-0 fw-normal">Básico</h4>
                    </div>
                    <div class="card-body" id="black">
                      <h1 class="card-title pricing-card-title">R$15<small id="black" class="text-body-secondary fw-light">/mês</small></h1>
                     <ul class="list-unstyled mt-3 mb-4">
                        <li>10 usuários incluídos</li>
                        <li>5GB de armazenamento</li>
                        <li>Suporte por e-mail</li>
                        <li>Acesso ao centro de ajuda</li>
                     </ul>
                      <a href="./registro.php"><button type="button" class="w-100 btn btn-lg btn-primary">Assinar Agora</button></a>
                    </div>
                  </div>
                </div>


                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                      <h4 class="my-0 fw-normal">Profissional</h4>
                    </div>
                    <div class="card-body" id="black">
                      <h1 class="card-title pricing-card-title">R$30<small id="black" class="text-body-secondary fw-light">/mês</small></h1>
                      <ul class="list-unstyled mt-3 mb-4">
                        <li>20 usuários incluídos</li>
                        <li>10GB de armazenamento</li>
                        <li>Suporte por e-mail</li>
                        <li>Acesso ao centro de ajuda</li>
                      </ul>
                      <a href="./registro.php"><button type="button" class="w-100 btn btn-lg btn-primary">Assinar Agora</button></a>
                    </div>
                  </div>
                </div>


                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                      <h4 class="my-0 fw-normal">Empreendimento</h4>
                    </div>
                    <div class="card-body" id="black">
                      <h1 class="card-title pricing-card-title">R$50<small id="black" class="text-body-secondary fw-light">/mês</small></h1>
                      <ul class="list-unstyled mt-3 mb-4">
                        <li>30 usuários incluídos</li>
                        <li>15GB de armazenamento</li>
                        <li>Suporte por e-mail</li>
                        <li>Acesso ao centro de ajuda</li>
                      </ul>
                      <a href="./registro.php"><button type="button" class="w-100 btn btn-lg btn-primary">Assinar Agora</button></a>
                    </div>
                  </div>
                </div>


               </div>
            </div>
          </div>
      </section>

      <?php include '../Assets/footer.php'; ?>

   </body>