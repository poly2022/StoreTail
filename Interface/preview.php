<?php
include('../DataAccessLayer/conectionBD.php');

$title = '';

$bookId = isset($_GET['id']) ? $_GET['id'] : null;


if ($bookId !== null) {
            $querybook="select * from books where id= '$bookId'";
            $resultbook=mysqli_query($conexao,$querybook);

            while($registo=mysqli_fetch_assoc($resultbook)){
                $title=$registo['title'];
                $cover_url=$registo['cover_url'];
                $read_time=$registo['read_time'];   
              }

           $queryAuthors_books="select * from author_books where books_id= '$bookId'";
            $resultAuthors_books=mysqli_query($conexao,$queryAuthors_books); 

            while($registo=mysqli_fetch_assoc($resultAuthors_books)){
                  $Authors_id=$registo['authors_id'];
                }

             $queryAuthors="select * from authors where id= '$Authors_id'";
            $resultAuthors=mysqli_query($conexao,$queryAuthors); 
            
            while($registo=mysqli_fetch_assoc($resultAuthors)){
                  $first_name=$registo['first_name'];
                  $last_name=$registo['last_name'];
                }
              }
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>StoreTails</title>

  <link href="css/style.css" rel="stylesheet">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">

  <link href="css/app.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/headers.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  .text-body-secondary {
    --bs-text-opacity: 1;
    color: #fff3cd !important;
  }

  .profile-image {
    width: 40px;
    height: 80px;
    border: 2px solid white;
    border-radius: 50%/50%;
    overflow: hidden;
    position: relative;
  }

  .profile-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    bottom: 0;
  }

  .custom-navbar {
    background-color: #E1700F;
    height: 60px;

    font-weight: bold;
    font-size: 12px;
    padding-right: 0.5rem;
    color: white
  }

  .nav-link {
    font-family: 'Montserrat', sans-serif;
    font-weight: bold;
    padding-right: 0.5rem;
    color: white
  }

  .custom-bg {
    --bs-btn-bg: #E95A0C;
    --bs-btn-color: #fff;
  }

  .nav-item {
    margin-right: 10px;
  }

  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    width: 100%;
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: white;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }

  .btn-bd-primary {
    --bd-orange-bg: #E95A0C;
    --bd-orange-rgb: 233, 90, 12;

    --bs-btn-font-weight: 600;
    --bs-btn-color: var(--bs-white);
    --bs-btn-bg: var(--bd-orange-bg);
    --bs-btn-border-color: var(--bd-orange-bg);
    --bs-btn-hover-color: var(--bs-white);
    --bs-btn-hover-bg: #D24700;
    --bs-btn-hover-border-color: #D24700;
    --bs-btn-focus-shadow-rgb: var(--bd-orange-rbg);
    --bs-btn-active-color: var(--bs-btn-hover-color);
    --bs-btn-active-bg: #D24700;
    --bs-btn-active-border-color: #D24700;
  }

  .bd-mode-toggle {
    z-index: 1500;
  }

  .bd-mode-toggle .dropdown-menu .active .bi {
    display: block !important;
  }

  .btn-size {
    --bs-btn-padding-y: .25rem;
    --bs-btn-padding-x: .5rem;
    --bs-btn-font-size: .75rem;
    "

  }

  .nav-pills .nav-link {
    border-bottom: 2px solid transparent;
    transition: border-color 0.3s, color 0.3s;
    padding-bottom: 1px;
    font-size: 14px;
  }

  .nav-pills .nav-link:hover,
  .nav-pills .nav-link:focus,
  .nav-pills .nav-link.active {
    color: #E95A0C !important;
    border-bottom-color: #E95A0C;
  }

  body {
    font-family: 'Montserrat', sans-serif;
  }

  .card-img-overlay {
    background-color: rgba(0, 0, 0, 0.6);
    position: bottom;
    bottom: 0;
    width: 100%;
    height: 5vh;
  }

  .btn-read {
    /* width: 100%; */
    background-color: #E95A0C; 
    color: white; 
    height: 30px; 
    line-height: 30px; 
    font-size: 14px; 
    font-weight: bold; 
    text-align: center;
    display: flex; 
    justify-content: center; 
    align-items: center;
  }

  .card-title {
    position: relative;
    bottom: 0;
    width: 100%;
    color: white;
    padding: 10px;
  }
  .card {
  width: 60%;
  height: 100%;
}

.custom-img {
  width: 100%;
  height: 180px;
  object-fit: cover;
}
.white-rectangle {
            width: 100%;
            height: 200px;
            background-color: white;
            border: 1px solid #ccc; /* Optional: Add a border for better visibility */
            justify-content:center;
            text-align:center;
            align-items:center;
        }
.white-rectangle-about {
    width: 100%;
    height: 550px;
    background-color: white;
    border: 1px solid #ccc; /* Optional: Add a border for better visibility */
    justify-content:center;
    text-align:center;
    align-items:center;
}
.image-about-position{
    position: absolute;
    margin-left: -620px;
    margin-top: 20px;
}

.title-about-position{
  position: absolute;
    margin-left: 400px;
    margin-top: 30px;
}
.from-author{
  position: absolute;
    margin-left: -250px;
    margin-top: 80px;
    font-size: 25px;
}
.rating{
  position: absolute;
    margin-left: -50px;
    margin-top: 100px;
}
.checked {
  color: orange;
}
.padding-20px{
  padding-right: 20px;
}
.textarea-size{
  position: absolute;
    margin-left: -260px;
    margin-top: 150px;
  border:0px
  display: block; 
  width: 900px;
  height: 700px;
}
.Button-read{
  position: absolute;
    margin-left: 40px;
    margin-top: 450px;
  background-color: #E95A0C;
  border-radius: 12px;
}
.Button-ativ{
  position: absolute;
    margin-left: 260px;
    margin-top: 450px;
  background-color: #E95A0C;
  border-radius: 12px;
}
.Sort{
  position: absolute;
    margin-left: 1230px;
    margin-top: -50px;
}
</style>

<body>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="facebook" viewBox="0 0 16 16">
      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
    </symbol>
    <symbol id="instagram" viewBox="0 0 16 16">
      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
    </symbol>
    <symbol id="twitter" viewBox="0 0 16 16">
      <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
    </symbol>
  </svg>

  <div class="dropdown position-fixed bottom-0 end-0 mb-2 me-2 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Light
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Dark
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
    </ul>
  </div>



  <main>
  <?php include('Header.php'); ?>

    <br>
      <div class="white-rectangle ">
        <br><br><br><br><br>
        <h1 style="color: black;" class="fw-bold mb-4"><?php echo $first_name; echo $last_name; ?></h1>
    </div>
      <div class="position-absolute w-100 bg-white">
        <div class="container">
          <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
              <a class="nav-link text-secondary me-3" href="livro.php">About this book</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary me-3" href="#">Read Now</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary" href="#">Tail it yourself</a>
            </li>
          </ul>
        </div>
      </div>


      <div class="container-fluid vh-100 d-flex justify-content-center align-items-center bg-body-tertiary">
  <div class="container" style="max-height: 80vh; overflow-y: auto;">
    <h1 style="color: #E95A0C;" class="text-center">ABOUT THE BOOK</h1>
    <div class="white-rectangle-about" >
        <div class="container">
        <img src="<?php echo $cover_url; ?>" class="img-fluid image-about-position " alt="...">
        </div>
        <h1 style="color: black;" class="fw-bold mb-4 title-about-position "><?php echo $first_name; echo $last_name; ?></h1>
        <label style="color: black;" class="from-author" for="html">From:<a href="autores.php?id=<?php echo $Authors_id; ?>" id="<?php echo $Authors_id; ?>" onclick="reply_click('<?php echo $Authors_id; ?>')"><?php echo $first_name; echo $last_name; ?></a></label><br>
        <div class= "container rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<label style="color: black;" class="padding-20px" for="ddas">4/5(4 Rating)</label>
<i style="color: black;" class="fa fa-book padding-20px">6 Pages</i>
<i style="color: black;" class="fa fa-clock-o padding-20px"><?php echo $read_time; ?> Minutes</i>
</div>
<label style="color: black;" class="textarea-size">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta ullam cupiditate deserunt quisquam ipsam, harum voluptate voluptatum voluptatibus sequi maxime fugit architecto aut ducimus distinctio aspernatur omnis aliquid accusamus. Ipsa!
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, maiores enim doloremque, quae blanditiis, molestiae ipsa eos nemo veniam rem eius. Recusandae facere repudiandae deleniti, libero laborum sit. Pariatur, suscipit.
  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto tempore quisquam necessitatibus quibusdam voluptates, nam sint quidem sapiente odio deleniti molestias quam dolore asperiores harum accusantium tempora delectus non ratione.
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, soluta numquam excepturi harum officia ipsam blanditiis earum distinctio velit, explicabo voluptatibus unde nisi culpa beatae maxime exercitationem a atque laboriosam.
</label>
<button class="Button-read">Read Now</button>
<a href="atividades.php?id=<?php echo $bookId;?>"><button class="Button-ativ">Atividades</button></a>
    </div>
  </div>
</div>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center bg-body-tertiary">
  <div class="container" style="max-height: 80vh; overflow-y: auto;">
    <h1 style="color: #E95A0C; font-size: 70px;" class="text-center">Related Books</h1>
    <button style="background-color: black;" class="Sort"><i style="color: white;" class="	fa fa-unsorted ">Sort</i></button>
    
    <div class="container bg-white py-4 mb-4" style="max-height: 80vh; overflow-y: auto;">
      <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php include("../Interface/book.php") ?>
      </div>
    </div>
  </div>
</div>


<?php include('footer.php'); ?>

    </div>

  </main>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>