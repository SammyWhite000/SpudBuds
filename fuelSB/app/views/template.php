<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"></meta>
    <meta name="author" content="SpudBuds"></meta>
    <meta name="keywords" content="HTML5, Homepage"></meta>
    <meta name="description" content="Fuel Template"></meta>
    <style type="text/css"></style>
    
    <?php echo Asset::css("spudbuds.css") ?>
    <title> <?php echo $title ?>  </title>
</head>
<body>
    <nav>
        <ul>
            <!-- Will need to change the links for SpudBuds https://www.w3resource.com/javascript-exercises/javascript-dom-exercise-7.php -->
            <li><a href="index.php">SpudBuds</a></li>
            <li><a href="bios.php">About Us</a></li>
            <li><a href="mosaic.php">Mosaic</a></li>
           
        </ul>
    </nav>

    <header>
       <h1> <?php echo $header; ?> </h1>
    </header>

    <main> 
        <?php echo $contents; ?> 
    </main>
    
    <footer>
         <p>CS312 Spring 2022 | SpudBuds | Group 14 </p>
    </footer>
</body>