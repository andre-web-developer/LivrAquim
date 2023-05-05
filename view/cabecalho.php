<link rel="stylesheet" href="../css/cabecalho.css">
<header>
   <a href="bem_vindo.php"><img class="logo" src="../img/logo-cabecalho.png" alt="livraquim logo"></a>
   <input type="checkbox" id="menu-bar">
   <label for="menu-bar">☰</label>
   <nav class="nav-links">
      <ul>
         <li><a href="form_venda.php">Vendas</a></li>
         
         <li><a href="#">Cadastrar +</a>
            <ul>
               <li><a href="form_livro.php">Livros</a></li>
               <li><a href="form_editora.php">Editora</a></li>
               <li><a href="form_autor.php">Autor</a></li>
               <li><a href="form_tema.php">Tema</a></li>
            </ul>
         </li>
         
         <li><a href="#">Listar +</a>
            <ul>
               <li><a href="listar_livro.php">Livros</a></li>
               <li><a href="listar_editora.php">Editora</a></li>
               <li><a href="listar_autor.php">Autor</a></li>
               <li><a href="listar_tema.php">Tema</a></li>
            </ul>
         </li>
         
         <li><a href="#">Relatórios +</a>
            <ul>
               <li><a href="#">Diário</a></li>
               <li><a href="#">Semanal</a></li>
               <li><a href="#">Mensal</a></li>
               <li><a href="#">Anual</a></li>
            </ul>
         </li>
      </ul>
   </nav>


   <a href="../controle/login.php?sair=true" class="sair-link"><button class="sair">Sair</button></a>
</header>