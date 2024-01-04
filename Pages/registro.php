<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php include '../Assets/metaTags.php'; ?>
      <script src="../JS/Validacoes.js" type="text/JavaScript"></script> 
      <link href="../CSS/Style(registro).css" rel="Stylesheet" type="text/css"/>
      <title>Crie Sua Conta</title>
   </head>
   <body>
      
      <?php include_once '../Assets/config.php'; ?>
      <?php include '../Assets/header.php'; ?>

      <section class="registro">
         <a href="../index.php">
            <img src="../image/logorecortsm.png" />
         </a>
         <form id="form">

            <div class="inputcontrol">
               <label for="nome">Seu Nome:</label> 
               <input type="text" placeholder="Nome Completo" id="nome" maxlength="60" oninput="validateInputText(this)"/>
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small>
            </div> 

            <div class="lado">

               <div class="inputcontrol" id="lado-a-lado">
                  <label for="data">Data Nascimento:</label>
                  <input type="date" id="data" name="data"/>
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>

               <div class="inputcontrol" id="lado-a-lado">
                  <label for="genero">Gênero:</label>
                  <select id="genero">
                     <option value="selecione" selected>Selecione</option>
                     <option value="masculino">Masculino</option>
                     <option value="feminino">Feminino</option>
                     <option value="Outros">Outros</option>
                     <option value="Prefiro-Nao-Informar">Não Informar</option>
                  </select>
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>

         </div>

            <div class="inputcontrol">
               <label for="nome-materno">Nome Da Mãe:</label> 
               <input type="text" placeholder="Nome Da Mãe" id="nome-materno" name="nome-materno" maxlength="60" oninput="validateInputText(this)"/>
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small>
            </div>

            <div class="inputcontrol">
               <label for="cpf">CPF:</label> 
               <input type="text" placeholder="Seu CPF" id="cpf" maxlength="14" autocomplete="off" />
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small> 
            </div>

            <div class="lado">

               <div class="inputcontrol" id="lado-a-lado">
                  <label for="celular">Celular:</label> 
                  <input type="tel" placeholder="(+55)XX-XXXXXXXX" id="celular" maxlength="17" autocomplete="off"/>
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>
               
               <div class="inputcontrol" id="lado-a-lado">
                  <label for="telefone">Telefone Fixo:</label> 
                  <input type="tel" placeholder="(+55)XX-XXXXXXXX" id="telefone" maxlength="16" autocomplete="off"/> 
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>
            
            </div>

            <div class="inputcontrol">
               <label for="cep">CEP:</label> 
               <input type="text" placeholder="CEP" id="cep" name="cep" autocomplete="off" maxlength="8" oninput="validateInputNumbers(this)"/> 
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small>
            </div>

            <div class="lado">

               <div class="inputcontrol" id="lado-a-lado">
                  <label for="estado">Estado:</label> 
                  <select name="estado" id="estado">
                     <option value="selecione" selected>Selecione</option>
                     <option value="AC">Acre</option>
                     <option value="AL">Alagoas</option>
                     <option value="AP">Amapá</option>
                     <option value="AM">Amazonas</option>
                     <option value="BA">Bahia</option>
                     <option value="CE">Ceará</option>
                     <option value="DF">Distrito Federal</option>
                     <option value="ES">Espírito Santo</option>
                     <option value="GO">Goiás</option>
                     <option value="MA">Maranhão</option>
                     <option value="MT">Mato Grosso</option>
                     <option value="MS">Mato Grosso do Sul</option>
                     <option value="MG">Minas Gerais</option>
                     <option value="PA">Pará</option>
                     <option value="PB">Paraíba</option>
                     <option value="PR">Paraná</option>
                     <option value="PE">Pernambuco</option>
                     <option value="PI">Piauí</option>
                     <option value="RJ">Rio de Janeiro</option>
                     <option value="RN">Rio Grande do Norte</option>
                     <option value="RS">Rio Grande do Sul</option>
                     <option value="RO">Rondônia</option>
                     <option value="RR">Roraima</option>
                     <option value="SC">Santa Catarina</option>
                     <option value="SP">São Paulo</option>
                     <option value="SE">Sergipe</option>
                     <option value="TO">Tocantins</option>
                   </select>
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>
               
               <div class="inputcontrol" id="lado-a-lado">
                  <label for="cidade">Cidade:</label> 
                  <input type="tel" placeholder="Cidade" id="cidade" autocomplete="off"/> 
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>
            
            </div>

            <div class="inputcontrol">
               <label for="nome-rua">Nome da rua:</label> 
               <input type="text" placeholder="Endereço" id="nome-rua" autocomplete="off"/> 
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small>
            </div>

            <div class="lado">

               <div class="inputcontrol" id="lado-a-lado">
                  <label for="bairro">Bairro:</label> 
                  <input type="tel" placeholder="Bairro" id="bairro" autocomplete="off"/>
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>
               
               <div class="inputcontrol" id="lado-a-lado">
                  <label for="numero">Número:</label> 
                  <input type="tel" placeholder="Número" id="numero-casa" autocomplete="off"/> 
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>
            
            </div>

            <div class="inputcontrol">
               <label for="email">Email:</label> 
               <input type="email" placeholder="Email" id="email"> 
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small>
            </div>

            <div class="inputcontrol">
               <label for="login">Login:</label> 
               <input type="text" placeholder="Login" id="login" name="login" maxlength="6" autocomplete="off" oninput="validateInput(this)" > 
               <i class="fas fa-exclamation-circle"></i>
               <i class="fas fa-check-circle"></i>
               <small>Erro</small>
            </div>

            <div class="lado">

               <div class="inputcontrol" id="lado-a-lado">
                  <label for="senha">Sua Senha:</label> 
                  <input type="password" placeholder="Sua Senha" id="senha" name="senha" maxlength="8" autocomplete="off" oninput="validateInput(this)" > 
                  <span class="fa-regular fa-eye olho" onclick="toggleSenha('senha')"></span>
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>

               <div class="inputcontrol" id="lado-a-lado">
                  <label for="confirmar-senha">Confirmar Senha:</label> 
                  <input type="password" placeholder="Confirmar senha" id="confirmar-senha" name="confirmar-senha" maxlength="8" autocomplete="off" oninput="validateInput(this)" />
                  <span class="fa-regular fa-eye olho" onclick="toggleSenha('confirmar-senha')"></span>
                  <i class="fas fa-exclamation-circle"></i>
                  <i class="fas fa-check-circle"></i>
                  <small>Erro</small>
               </div>

            </div>

            <input type="button" value="Criar Conta" id="submit"/>

            <div class="teste">
               <div class="links">
                  <a href="login.php" id="login">Já possui Conta? Entre Agora</a>
               </div><!--links-->

               <div class="limpar">
                  <input type="reset" id="bnt-limpar"  value="Limpar Campos"/>
               </div><!--limpar-->
            </div>

         </form>
      </section>

      <?php include '../Assets/footer.php'; ?>

   </body>
</html>