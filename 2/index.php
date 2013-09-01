<?php
    $section = $_GET["s"];
    $subsection = $_GET["t"];
    if (!$section) {
        $section = "home";
    }

    $nav = array(
        "home" => "Home",
        "lessons" => "French Lessons",
        "meetthetutors" => "Meet The Tutors",
        "resources" => "Resources",
        "testimonials" => "Testimonials",
        "other" => "Other Languages",
        "contact" => "Contact Us"
    );
    $subnavs = array(
        "lessons" => array(
            "children" => "Group Classes for Young Children",
            "adults" => "Group Classes for Adults",
            "private" => "Private Classes for Adults &amp; Secondary Students",
            "internet" => "Internet Teaching",
            "business" => "Business French"
        ),
        "resources" => array(
            "ks2" => "KS2 Teaching Resources",
            "media" => "French Media Guide"
        )
    );
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Parlons Fran&ccedil;ais</title>
        <base href="http://www.parlons-francais.co.uk/v2/2/" />
        <meta name="description" content="French language courses taught by French people, Learn French with the French" />
        <link href="static/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <a href="."><img id="logo-flag" src="static/images/logo_small.jpg" alt="Parlons Fran&ccedil;ais" /></a>
                    <img id="logo-lfwtf" src="static/images/lfwtf.png" alt="Learn French with the French" />
                </div>
                <div id="contact">
                    07752 185557<br />
                    info@parlons-francais.co.uk
                </div>
                <div id="about">
                    <img id="about-logo" src="static/images/sophie.png" alt="Sophie Franklin" />
                    <img id="about-title" src="static/images/welcome.png" alt="Welcome" />
                    Parlons Fran&ccedil;ais is run by Sophie Franklin, a French national with a wide experience
                    of teaching to adults at all levels, secondary school students ('A' level and GCSE)
                    and young children
                </div>
            </div>
            <ul id="menu">
                <?php
                    $subnav = $subnavs[$section];

                    $width = 100 / count($nav);
                    foreach ($nav as $link => $name) {
                        $class = '';
                        if ($section == $link) {
                            $class = ' is-current';
                            if ($subnav) {
                                $class .= ' has-submenu';
                            }
                        }
                        print("<li class=\"menu-item$class\" style=\"width: $width%\"><a class=\"menu-item-link\" href=\"$link\">$name</a></li>");
                    }

                    if ($subnav) {
                        print('</ul><ul id="submenu">');

                        $width = 100 / count($subnav);
                        foreach ($subnav as $link => $name) {
                            $class = $subsection == $link ? ' is-current' : '';
                            print("<li class=\"menu-item$class\" style=\"width: $width%\"><a class=\"menu-item-link\" href=\"$section/$link\">$name</a></li>");
                        }
                    }
                ?>
            </ul>
            <?php
                if ($subsection) {
                    include("sections/$section/$subsection.php");
                } else {
                    include("sections/$section.php");
                }
            ?>
            <div id="footer">
                Last updated: <?= date("d/m/Y") ?>.
                &copy; <?= date("Y") ?> Parlons Fran&ccedil;ais.
                All Rights Reserved.
            </div>
        </div>
    </body>
</html>
