<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="p5.min.js"></script>
    <script src="p5.dom.min.js"></script>
    <script src="p5.sound.min.js"></script>
    <script src="p5.serialport.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <mta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Controller Arus</title>

    <!-- Load file bootstrap.min.css yang ada di folder css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .align-middle {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
    <!-- Membuat Menu Header / Navbar -->
  <?php
  
  if (!isset($_GET['menu'])) {
    header("location:hal_utama.php?menu=petugas");
 
}
  ?>
  <iframe src="monitoringg.php" height= 100% width=100% ></iframe>
</body>
</html>