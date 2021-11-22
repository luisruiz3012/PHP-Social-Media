<?php
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>ProgramMe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CDN FA -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  </head>
  <body>
      <header class="main-header">
          <nav class="navbar navbar-expand-sm|md|lg|-xl navbar-dark bg-dark">
                <div class="container">
                  <a class="navbar-brand" href="/social-media/index.php">The Network</a>
                  
                  <ul class="nav justify-content-center|justify-content-end">
                      <?php if(isset($_SESSION['id'])){ ?>
                            <li class="nav-item d-flex align-items-center">
                                <a href="/social-media/views/profile.php"><img style="width:30px; height:30px; border-radius: 50%; object-fit:cover;" src="<?php echo $_SESSION['image'] ?>" alt="<?php echo $_SESSION['name'] ?>" /></a>
                                <a class="nav-link text-white" href="/social-media/views/profile.php"><?php echo $_SESSION['name']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/social-media/logout.php">Logout</a>
                            </li>
                        <?php } ?>
                  </ul>
            </div>
          </nav>     
      </header>