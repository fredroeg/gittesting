<?php
    //TEMPLATE
    include_once "templates/header.php";
    include_once "templates/footer.php";
    include_once "templates/navigation.php";
    
    //MYSQL CONTROLLER
    include_once "classes/Controller.php";
    
    if(!isset($_SESSION)){
            session_Start();
    }
    
    $per_page = 2;
    
    $controller = new Controller();
    $start = 0;
    
    $posts = $controller->getPostsStartLimit($start, $per_page);
    
    print $header;
?>
        <title>Roger That - Home</title>
</head>
<body>
    <?php print $navigation; ?>
    <div id="container">
        <div id="blueBalk"></div>
        <div id="columnContent">
            <div id="left">
                <h1>Home</h1>
                <img src="images/site/robot.png" alt="Robot" class="homeImage" />
                <p class="homeparagraph">Welkom op de site Roger That, ontwikkeld door Frederick Roegiers. U kan hier onder andere mijn laatste <a href="blog.php">blogs</a> en <a href="blog.php">portfolio</a>-items terug.</p>
                <p class="homeparagraph">Deze site wordt regelmatig geupdatet zodat u steeds op de hoogte kan blijven van mijn laatste opdrachten.</p>
            </div>
            <div id="right">
                <h2>Laatste Nieuws</h2>
                <?php
                if($posts != "Fault")
                {
                    for ($i = 0; $i < sizeof($posts[0]); $i++)
                    {
                        echo'<a class="newsa" href="blog.php">';
                        echo '<div class="newsitem">';
                        echo '<h4>' . $posts[1][$i] . '</h4>';
                        echo '<span class="datum">' . $posts[2][$i]  . '</span>';
                        echo '<p>' . $posts[3][$i] . '</p>';
                        echo '</div>';
                        echo '</a>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php
    print $footer;
?>