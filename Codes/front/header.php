<?php 
$menu = menu(); 
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "./front/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,200;0,400;0,700;1,400;1,700&family=Inter:wght@800&display=swap" rel="stylesheet">
    
    <title>Szakdolgozat</title>
</head>
<body>
    <?php include "./front/menu.php"; ?>
    <nav class = "menuflex">
        <input type = "checkbox" id = "check">
        <label class = "logo">PORTFOLIO</label>
        <ul>
        <?php foreach($menu as $m): ?>
            <li><a class = "<?= $page === $m['link'] ? 'current' : '' ?>" href='./?menu=<?= $m['link']?>'><?= $m['text_key']?></a></li>
        <?php endforeach; ?>
        </ul>
        <label for = "check" class = "checkbtn">   
            <i class="fa-solid fa-bars"></i>
        </label>
    </nav>
<main>


 
