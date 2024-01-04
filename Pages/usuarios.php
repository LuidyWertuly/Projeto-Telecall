<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <link href="../CSS/Style(Usuarios).css" rel="Stylesheet" type="text/css"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
      <script src="../JS/usuarios.js" type="text/JavaScript"></script> 
      <title>Usuários</title>
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>

      <section class="usuarios">
         <a href="../index.php">
            <img src="../image/logorecortsm.png" />
         </a>

         <div class="user-dados">
   
            <h1>Lista de usuários</h1>
            <p id="resposta"></p>

            <div class="utilitarios">
               <div class="order">
                  <label for="ordem">Ordem de exibição:</label>
                  <select id="ordem" name="ordem">
                     <option selected value="crescente">Crescente</option>
                     <option value="decrescente">Decrescente</option>
                  </select>
               </div>

               <!-- <div class="quantidade">
                  <label for="">Quantidade exibição:</label>
                  <select name="view" id="view">
                     <option selected value="10">10 Por página</option>
                     <option value="20">20 Por página</option>
                     <option value="30">30 Por página</option>
                  </select>
               </div> -->

               <div class="functions">
                  <!-- <button  id="download">Baixar PDF</button> -->
                  <a href="../PHP/gerarPDF.php" id="download" target="_blank" download="usuarios.pdf">Baixar PDF</a>
               </div>
               <div class="functions">
                  <button id="debug">Debug</button>
               </div>

            </div>

            <div class="divisor"></div>

            <div class="busca">
                  <div class="select">
                     <label for="buscaTipo">Buscar por:</label>
                     <select name="buscaTipo" id="buscaTipo">
                     <option selected value="selecione">Selecione</option>
                        <option value="idUser">ID</option>
                        <option value="cargo">Cargo</option>
                        <option value="login">Login</option>
                        <option value="senha">Senha</option>
                        <option value="CEP">CEP</option>
                        <option value="nomeMae">Nome da mãe</option>
                        <option value="DTnascimento">Data de nascimento</option>
                     </select>
                  </div>
                  <div class="procura">
                     <input id="procurar" type="search" placeholder="Buscar">
                     <button id="search">Buscar</button>
                  </div>
               </div>

               <div class="divisor"></div>
               
            <div class="tabela">
               <table>
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Cargo</th>
                        <th>Login</th>
                        <th>Senha</th>
                        <th>CEP</th>
                        <th>Nome da mãe</th>
                        <th>Data de nascimento</th>
                        <th>Ações</th>
                     </tr>
                  </thead>
                  <tbody id="tabelaUsuarios">
                     <?php 

                     include_once('../PHP/conexao.php');
                     $usuarios = mysqli_query($conexao, "SELECT * FROM usuarios") ;
                     $rows = mysqli_num_rows($usuarios);
                     
                     if($rows !== 0){
                        while($row = mysqli_fetch_assoc($usuarios)){
                           echo '<tr>';
                           echo '<td>' . '<h1 class="input-table campo-idUser" id="input-idUser">' . $row['idUser'] . '</h1>' . '</td>';
                           echo '<td>' . '<input class="input-table off campo-cargo" id="input-cargo" type="text" value="' . $row['cargo'] . '" placeholder="Insira os dados" maxlength="5" disabled oninput="validateInputText(this)">' . '<i class="fa-solid fa-rotate-left"></i>' . '</td>';
                           echo '<td>' . '<input class="input-table off campo-login" id="input-login" type="text" value="' . $row['login'] . '" placeholder="Insira os dados" maxlength="6" disabled oninput="validateInputText(this)">' . '<i class="fa-solid fa-rotate-left"></i>' . '</td>';
                           echo '<td>' . '<input class="input-table off campo-senha" id="input-senha" type="text" value="' . $row['senha'] . '" placeholder="Insira os dados" maxlength="8" disabled oninput="validateInputText(this)">' . '<i class="fa-solid fa-rotate-left"></i>' . '</td>';
                           echo '<td>' . '<input class="input-table off campo-cep" id="input-cep" type="text" value="' . $row['cep'] . '" placeholder="Insira os dados" maxlength="9" disabled oninput="validateInputNumbers(this)">' . '<i class="fa-solid fa-rotate-left"></i>' . '</td>';
                           echo '<td>' . '<input class="input-table off campo-nomeMae" id="input-nomeMae" type="text" value="' . $row['nomeMae'] . '" placeholder="Insira os dados" disabled oninput="validateInputText(this)">' . '<i class="fa-solid fa-rotate-left"></i>' . '</td>';
                           echo '<td>' . '<input class="input-table off campo-DTnascimento" id="input-DTnascimento" type="date" value="' . $row['DTnascimento'] . '" placeholder="Insira os dados" disabled>' . '<i class="fa-solid fa-rotate-left"></i>' . '</td>';
                           echo '<td class="acoes">' . '<input class="bntEditar" type="button" value="Editar">' . '<input class="bntExcluir" type="button" value="Excluir">' . '<input class="bntSalvar" type="button" value="Salvar">' . '<input class="bntCancelar" type="button" value="Cancelar">' .  '</td>';
                           echo '</tr>';
                        }
                     }
                     else{
                        echo '</table> <br/> <h2> Sem usuários cadastrados </h2> <br/>';
                     }
                     ?>
                  </tbody>
               </table>
               <!-- <button id="carregarMais">Carregar mais</button> -->
            </div> <!--tabela-->

         </div> <!--user-dados-->

      </section> <!--usuarios-->

      <?php include '../Assets/footer.php'; ?>

   </body>
</html>