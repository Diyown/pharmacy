<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pharmacy</title>
    <style>
        .carousel-item img {
            width: 100%;
            height: 600px; /* Set the desired height */
            object-fit: cover;
        }
    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-sm navbar-light bg-light">
  <div class="container">
        <a href="" class="navbar-brand mb-0 h3">Pharmacy</a>

        <button type="button" data-bs-toggler="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="naebar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="#" class="nav-link active">Home</a>
                </li>

                <li class="nav-item active">
                    <a href="#" class="nav-link active">Prescription</a>
                </li>

                <li class="nav-item active">
                    <a href="#" class="nav-link active">Contact</a>
                </li>

                <li class="nav-item active dropdown">
                    <a href="#" class="nav-link active dropdown-toggle" 
                    id="navbarDropdown" 
                    role="button" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false">
                    About us
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="#" class="dropdown-item">Company Profile</a></li>
                        <li><a href="#" class="dropdown-item">Our Story</a></li>
                        <li><a href="#" class="dropdown-item">Team</a></li>
                        <li><a href="#" class="dropdown-item">FAQ</a></li>
                    </ul>
                </li>

                <div class="ms-2">
                    <button type="button" class="btn btn-success">Login</button>
                </div>

                <div class="ms-2">
                <button type="button" class="btn btn-info">Sign Up</button>
                </div>
            </ul>
        </div>
    </nav>
  </div>

  <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/pic1.jpg" class="d-block w-100" style="width: 100%; height: 500px;" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/pic2.jpg" class="d-block w-100" style="width: 100%; height: 500px;" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/pic3.jpg" class="d-block w-100" style="width: 100%; height: 500px;" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>













    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>