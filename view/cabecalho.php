<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/cabecalho.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="bem_vindo.php"><img src="../img/logo-cabecalho.png" alt="livraquim logo"></a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name"><a href="bem_vindo.php">LivrAquim</a></span>
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li><a href="form_venda.php">VENDAS</a></li>
          
          <li>
            <a href="#">CADASTRAR</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="form_livro.php">Livro</a></li>
              <li><a href="form_tema.php">Tema</a></li>
              <li><a href="form_autor.php">Autor</a></li>
              <li><a href="form_editora.php">Editora</a></li>
            </ul>
          </li>

          <li>
            <a href="#">LISTAR</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="listar_livro.php">Livro</a></li>
              <li><a href="listar_tema.php">Tema</a></li>
              <li><a href="listar_autor.php">Autor</a></li>
              <li><a href="listar_editora.php">Editora</a></li>
            </ul>
          </li>

          <li>
            <a href="#">RELATÓRIO</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="#">Diário</a></li>
              <li><a href="#">Semanal</a></li>
              <li><a href="#">Mensal</a></li>
              <li><a href="#">Anual</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <a href="../controle/login.php?sair=true" class="sair-a"><button class="sair">Sair</button></a>
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
    let htmlcssArrow = document.querySelector(".htmlcss-arrow");
    htmlcssArrow.onclick = function() {
      navLinks.classList.toggle("show1");
    }
    let moreArrow = document.querySelector(".more-arrow");
    moreArrow.onclick = function() {
      navLinks.classList.toggle("show2");
    }
    let jsArrow = document.querySelector(".js-arrow");
    jsArrow.onclick = function() {
      navLinks.classList.toggle("show3");
    }
  </script>