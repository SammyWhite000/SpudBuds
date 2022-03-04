<head>
    <title><?php $title; ?> </title>
    <meta charset="utf=8"></meta>
    <meta name="author" content="Sammy White"></meta>
    <meta name="description" content="Fuel Template"></meta>
    
    <?php echo Asset::css('main.css') ?>
    <?php echo Asset::css('east.css') ?>
    
</head>
<!-- use css file in cs312->fuelView->css file -->
<body>
    <h1> Hello This is the Amazing Template file </h1>
    <?php echo "This is the first var access example : $content";?>

    <main>
        <?php echo $content;?>
    </main>
</body>
