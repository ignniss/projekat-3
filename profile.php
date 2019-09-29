
<?php
session_start();
$id=$_SESSION['id'];

require 'connection.php';
$sql ="SELECT * FROM users WHERE id= $id";
$query =mysqli_query($conn, $sql);
$result=mysqli_fetch_assoc($query); 
$tezina=$result['tezina'];
$visina=$result['visina'];
$bmi=round ($tezina/pow($visina/100, 2),2);
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Aldrich&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Style/bootstrap.css">
    <link rel="stylesheet" href="Style/style.css">
    <link rel='stylesheet' href="Style/login.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <nav id="navBar" class="navbar text-uppercase navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand text-success font-weight-bolder" href="index.php"><img id="logo" src="Img/logo.png"
                    alt=""> ozon cross gym </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="training.php">cross gym training</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cross_sport_kids.php">cross sport kids</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">about us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="gallery.php" active>gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">contact us</a>
                    </li>

                    <?php if(isset($_SESSION['id'])):  ?>
                    
                    <li class="nav-item">
                        <a class="nav-link text-success" href="profile.php">profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">logout</a>
                    </li>
                    
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="login.php">login/Register</a>
                    </li>
                    <?php endif ?>

                    <li class="nav-item">
                        <img id="ser" src="Img/ser.png" alt="SER">
                        <img id="uk" src="Img/uk.png" alt="ENG">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
<div class="row">
<div class="col-4">
<html>
<body>
		
<form method="POST" action="getdata.php" enctype="multipart/form-data">
 <input type="file" name="myimage">
 <input type="submit" name="submit_image" value="Upload">
</form>

</body>
</html>


</div>

<div class="col-8">
    <p class="font-weight-bold display-4 text-center text-dark">DOBRO DOŠLI</p>
    <p class="font-weight-bold text-center">VAŠ PROFIL:</p> 
    <p class="font-weight-bold">IME: <?php echo '<span class="text-success font-weight-bold text-light">'. $result['ime'].'</span>'  ?> </p> 
    <p class="font-weight-bold">PREZIME: <?php echo '<span class="text-success font-weight-bold text-light">'.$result['prezime'].'</span>'  ?></p>
    <p class="font-weight-bold">VAŠ ID: <?php echo '<span class="text-success font-weight-bold text-light">'.$result['id'].'</span>'  ?></p>
    <p class="font-weight-bold">VRSTA PROGRAMA: <?php echo '<span class="text-success font-weight-bold text-light">'. $result['tip_programa'].'</span>'  ?></p>
    <p class="font-weight-bold">POL: <?php echo '<span class="text-success font-weight-bold text-light">'. $result['pol'].'</span>'  ?> </p>
    <p class="font-weight-bold">VISINA: <?php echo '<span class="text-success font-weight-bold text-light">'. $result['visina'].' cm </span>'  ?> </p>
    <p class="font-weight-bold">TELESNA MASA: <?php echo '<span class="text-success font-weight-bold text-light">'. $result['tezina'].' kg </span>'  ?> </p>
    <p class="font-weight-bold">BMI: <?php echo '<span class="text-success font-weight-bold text-light">'. $bmi.'</span>' ?>
    <?php  
    
    switch ($bmi){
        case $bmi<18.5:
        echo  '<span class="text-success font-weight-bold text-warning"> (neuhranjenost)</span>';
        break;
        case $bmi<24.9:
        echo '<span class="text-success font-weight-bold text-success"> (idealna telesna masa)</span>';
        break;
        case $bmi<29.9:
        echo'<span class="text-success font-weight-bold text-warning"> (prekomerna masa)</span>';
        break;
        case $bmi<34.9:
        echo '<span class="text-success font-weight-bold text-warning"> (blaga gojaznost)</span>';
        break;
        case $bmi<39.9:
        echo '<span class="text-success font-weight-bold text-danger"> (teška gojaznost)</span>';
        break;
        
        default:
        echo '<span class="text-success font-weight-bold text-danger"> (ekstremna gojaznost)</span>';
    }
    
    ?>
    
     </p>
    <form action="profile-change.php">
    <button class="btn btn-warning mb-4">IZMENI</button>
    </form>
    <p class="font-weight-bold text-center text-light">PRIJAVITE PRISUSTVO NA TRENINGU</p>
    <button class="btn btn-success mb-4">PRIJAVI SE</button>
    



</div>

</div>


    </div>
    












    <div id="footer" class="bg-dark">
        <h2>REKLAME</h2>
    </div>
</body>

</html>