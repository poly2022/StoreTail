<header class="position-relative">
  <div class="position-absolute w-100">
    <!-- Barra de navegação superior -->
    <div class="container-fluid p-2 mb-0 position-absolute w-100" style="background-color: #E95A0C;">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <!-- Link do logotipo da página -->
          <a href="/" class="link-body-emphasis text-decoration-none">
            <span style="color: #ffffff; font-size: 14px;">STORYTAILS</span>
          </a>
          <!-- Formulário de pesquisa -->
          <div class="input-group mb-0" style="max-width: 600px; margin: auto;">
            <form action="search.php" method="POST">
              <input type="text" class="form-control" placeholder="eg: title, type..." name="search" id="search" aria-label="Search" style="width: 400px;" aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" style="background-color: black;" name="Submit-Search" type="submit" id="Submit-Search">
                <i class="fa fa-search" style="color: white;"></i>
              </button>
            </form>
          </div>
          <!-- Links de navegação à direita -->
          <div class="text-end"> 
            <!-- Botão "Home" -->
            <a href="index.php">
              <button type="button" class="btn btn-outline-light me-3 btn-sm fs-8 btn-size">Home</button>
            </a>
            <!-- Botão de registro -->
            <a href="registar.php"> 
              <button type="button" class="btn btn-bd-primary btn-sm fs-8 btn-size">
                <i class="fa fa-user-o" style="font-size:25px;"></i>
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
