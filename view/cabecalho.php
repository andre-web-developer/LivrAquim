<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../cabecalho.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <nav>
      <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="bem_vindo.php"><img src="../img/logo-cabecalho.png" alt="livraquim logo"></a></div>
        <div class="nav-links">
          <div class="sidebar-logo">
            <span class="logo-name">LivrAquim</span>
            <i class='bx bx-x'></i>
          </div>
          <ul class="links">
            <li>
              <a href="#">CADASTRAR</a>
              <i class='bx bxs-chevron-down cad-arrow arrow  '></i>
              <ul class="cad-sub-menu sub-menu">
                <li><a href="form_livro">Livro</a></li>
                <li><a href="form_tema">Tema</a></li>
                <li><a href="form_autor">Autor</a></li>
                <li><a href="form_editora">Editora</a></li>
                
              </ul>
            </li>
            <li><a href="form_venda.php">VENDAS</a></li>
            <li>
              <a href="#">LISTAR</a>
              <i class='bx bxs-chevron-down lis-arrow arrow '></i>
              <ul class="lis-sub-menu sub-menu">
                <li><a href="listar_livro">Livro</a></li>
                <li><a href="listar_tema">Tema</a></li>
                <li><a href="listar_autor">Autor</a></li>
                <li><a href="listar_editora">Editora</a></li>
              </ul>
            </li>
            <li>
              <a href="#">RELATÓRIOS</a>
              <i class='bx bxs-chevron-down rel-arrow arrow'></i>
              <ul class="rel-sub-menu sub-menu">
                <li><a href="form_relatDiario.php">Diário</a></li>
                <li><a href="form_relatMensal.php">Mensal</a></li>
                <li><a href="form_relatAnual.php">Anual</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="sair">
          <a href="../controle/login.php?sair=true"><i class='bx bx-log-out'></i></a>
        </div>
      </div>
    </nav>

    <script>
      // sidebar open close js code
      let navLinks = document.querySelector(".nav-links");
      let menuOpenBtn = document.querySelector(".navbar .bx-menu");
      let menuCloseBtn = document.querySelector(".nav-links .bx-x");
      menuOpenBtn.onclick = function() {
        navLinks.style.left = "0";
      }
      menuCloseBtn.onclick = function() {
        navLinks.style.left = "-100%";
      }


      // sidebar submenu open close js code
      let cadArrow = document.querySelector(".cad-arrow");
      cadArrow.onclick = function() {
        navLinks.classList.toggle("show1");
      }
      let lisArrow = document.querySelector(".lis-arrow");
      lisArrow.onclick = function() {
        navLinks.classList.toggle("show2");
      }
      let relArrow = document.querySelector(".rel-arrow");
      relArrow.onclick = function() {
        navLinks.classList.toggle("show3");
      }
    </script>
  </body>
</html>
