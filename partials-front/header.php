<?php include("database/database.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Restaurant Website</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <!--navbar section starts-->
   <section class="navbar navbar-expand-sm">
    <div class="container container-fluid">
        <div class="brand-logo">
            <a href="index.html" title="go to homepage"><img src="images/logo6.png" alt="logo" class="img-fluid"></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="menu collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $siteurl;?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $siteurl;?>foods.php">Foods</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $siteurl;?>categorypage.php">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $siteurl;?>About.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $siteurl;?>contact.php">Contact</a>
                </li>
               
            </ul>
        </div>
    </div>
   </section>