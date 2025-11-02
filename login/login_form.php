<!-- Seesion Start -->
<?php
    session_start();
    if (isset($_SESSION['level'])) {
        // Jika ada sesi apapun (pembeli atau penjual), hancurkan
        session_unset();
        session_destroy();
        // Alihkan ke halaman utama setelah sesi dihancurkan
        header("Location: ../landing_page.php");
        exit;
    }
?>
<!-- Session End -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Metadata -->
    <?php include('../metadata.php'); ?>
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- My Style -->
    <link rel="stylesheet" href="../css/bootstrap_style.css">
    <style>
    html,
    body {
        overflow-y: auto;
    }

    .navbar {
        position: fixed;
        z-index: 1000;
        width: 100%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    footer {
        width: 100%;
        background-color: white;
    }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="container-fluid ms-3 me-3">
            <a class="navbar-brand" style="font-weight: bold;" href="#">
                Alzi Petshop
            </a>
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow p-4" style="width: 25rem;">
            <div class="card-body">
                <h2 class=" text-center mt-2 mb-4">Login</h2>
                <?php
                    if (isset($_GET['error']) && $_GET['error'] != '') {
                        echo '<div class="alert alert-danger text-center">' . htmlspecialchars($_GET['error']) . '</div>';
                    }
                ?>
                <form action="login_proses.php" method="post">
                    <div class="form-group mb-3">
                        <label for="login_input" class="form-label">Email:</label>
                        <input type="login_input" class="form-control" id="login_input" name="login_input" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group text-center mb-3">
                        <button type="submit" class="btn btn-warning form-control">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>