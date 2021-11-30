<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metal world</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<!--    <script src="../../script.js"></script>-->
    <style>
        <?php include "public/css.css" ?>
    </style>
    <script src="https://kit.fontawesome.com/7558fd3819.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="header">
    <nav>
        <a href="?c=home"><img src= "<?= \App\Config\Configuration::UPLOAD_DIR . 'logo.png'?>" alt="logo"></a>
        <div class="nav-links" id="navLinks">
            <i class="fas fa-times-circle" onclick="hideNav()"></i>
            <ul>
                <li><a href="?c=home">HOME</a></li>
                <li><a href="?c=band&a=bands">BANDS</a></li>
                <li><a href="?c=shop&a=shop">SHOP</a></li>
                <li><a href="?c=home&a=about">ABOUT</a></li>
                <li><a href="?c=home&a=contact">CONTACT</a></li>
                <?php if (!App\Auth::isLogged()) {?>
                    <li><a href="?c=auth&a=loginForm">LOGIN</a></li>
                    <li><a href="?c=auth&a=registration">REGISTER</a></li>
                <?php } else { ?>
                    <li><a href="?c=auth&a=logout">LOGOUT</a></li>
                <?php } ?>
            </ul>
        </div>
        <i class="fas fa-bars" onclick="showNav()"></i>
        <!-- functions which are hiding the navigation -->
        <script>
            let navLinks = document.getElementById("navLinks");

            function showNav(){
                // navLinks.style.right = "0";
                navLinks.style.visibility = "visible";
            }
            function hideNav(){
                // navLinks.style.right = "-200px";
                navLinks.style.visibility = "hidden";
            }
        </script>
    </nav>
</section>



<?= $contentHTML?>

</body>
</html>

