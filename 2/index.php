<?php
    $section = $_GET['s'];
    if (!$section) $section = 'main';
?>
<html>
    <head>
        <title>Parlons Fran&ccedil;ais</title>
        <meta name="description" content="French language courses taught by French people, Learn French with the French" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script src="jquery-1.8.1.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <a href="."><img src="images/logo_small.jpg" alt="Parlons Fran&ccedil;ais" /></a>
                    <img src="images/lfwtf.png" alt="Learn French with the French" />
                </div>
                <div id="contact">
                    07752 185 557<br />
                    info@parlons-francais.co.uk
                </div>
                <div id="about">
                    <img class="logo" src="images/sophie.png" alt="Sophie Franklin" />
                    <img class="title" src="images/welcome.png" alt="Welcome" />
                    Parlons Fran&ccedil;ais is run by Sophie Franklin, a French national with a wide experience
                    of teaching to adults at all levels, secondary school students ('A' level and GCSE)
                    and young children
                </div>
            </div>
            <ul id="menu">
                <?php
                    $nav = array(
                        "lessons" => "French Lessons",
                        "library" => "Library",
                        "resources" => "Resources",
                        "testimonials" => "Testimonials",
                        "other" => "Other Languages",
                        "contact" => "Contact Us"
                    );
                    foreach ($nav as $link => $name) {
                        $current = $section == $link ? ' class="current"' : '';
                        print("<li$current><a href=\"?s=$link\">$name</a></li>");
                    }
                ?>
            </ul>
            <div id="body"><?php include("$section.php"); ?></div>
            <div style="clear:both"></div>
        </div>
    </body>
</html>