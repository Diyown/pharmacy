<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pharmacy</title>
    <style>
        .carousel-item img {
            width: 100%;
            height: 600px;
            object-fit: cover;
        }
		
    </style>
</head>
<body>

<?php
require_once "connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup_form'])) {
        // Signup form was submitted
        if (isset($_POST['idno']) && isset($_POST['LastName']) && isset($_POST['FirstName']) && isset($_POST['Email']) && isset($_POST['Passwords'])) {
            $idno = $_POST['idno'];
            $lastName = $_POST['LastName'];
            $firstName = $_POST['FirstName'];
            $email = $_POST['Email'];
            $password = $_POST['Passwords'];

            $check_query = "SELECT * FROM users WHERE idno = '$idno'";
            $check_result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($check_result) > 0) {
                echo '<script>';
                echo 'Swal.fire("Error!", "ID Number already exists", "error");';
                echo '</script>';
            } else {
                $sql = "INSERT INTO users (idno, last_name, first_name, email, password) VALUES ('$idno', '$lastName', '$firstName', '$email', '$password')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script>';
                    echo 'Swal.fire("Success!", "Sign up successful!", "success");';
                    echo '</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        } else {
            echo '<script>';
            echo 'Swal.fire("Error!", "Please fill in all required fields", "error");';
            echo '</script>';
        }
    } elseif (isset($_POST['login_form'])) {
        $idno = $_POST['idno'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE idno = '$idno'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($idno == '1234' && $password == 'admin' ){
			header('Location: admin.php');
		}
		
		else if ($user) {
            if ($_POST['password'] == $user["password"]) {
                $_SESSION["idno"] = $user["idno"];
                echo '<script>';
                echo 'Swal.fire("Success!", "You have successfully logged in!", "success").then(() => { window.location = "homepage.php"; });';
                echo '</script>';
                die();
            } else {
                echo '<script>';
                echo 'Swal.fire("Error!", "Password incorrect", "error");';
                echo '</script>';
            }
        }
		
		else {
            echo '<script>';
            echo 'Swal.fire("Error!", "ID Number does not exist", "error");';
            echo '</script>';
        }
    }
}
?>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a href="" class="navbar-brand mb-0 h3">Judy Botika</a>

        <button type="button" data-bs-toggler="collapse" data-bs-target="#navbarNav" class="navbar-toggler"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item active">
                    <a href="medicine.php" class="nav-link active">Medicines</a>
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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                        Login
                    </button>
                </div>

                <div class="ms-2">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#signupModal">
                        Sign Up
                    </button>
                </div>
            </ul>
        </div>
    </nav>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">LOGIN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="login.php">
                    <input type="hidden" name="login_form" value="1">
                    <div class="mb-3">
                        <label for="idno" class="form-label">ID Number</label>
                        <input type="number" class="form-control" id="Email" name="idno">
                    </div>

                    <div class="mb-3">
                        <label for="Pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Pass" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="login.php">
                    <input type="hidden" name="signup_form" value="1">
                    <div class="mb-3">
                        <label for="idno" class="form-label">ID Number</label>
                        <input type="text" class="form-control" id="idno" name="idno" required>
                    </div>

                    <div class="mb-3">
                        <label for="LastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="LastName" name="LastName" required>
                    </div>

                    <div class="mb-3">
                        <label for="FirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="FirstName" required>
                    </div>

                    <div class="mb-3">
                        <label for="EmailAd" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="EmailAd" name="Email" required>
                    </div>

                    <div class="mb-3">
                        <label for="Passwords" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Passwords" name="Passwords" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/1.jpg" class="d-block w-100" style="width: 100%; height: 500px;"
                             alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/2.jpg" class="d-block w-100" style="width: 100%; height: 500px;"
                             alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/3.jpg" class="d-block w-100" style="width: 100%; height: 500px;"
                             alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/4.jpg" class="d-block w-100" style="width: 100%; height: 500px;"
                             alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
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
