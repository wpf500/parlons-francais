<?php
    $section = $_GET["s"];
    if (!$section) $section = "main";

    function print_nav($type, $nav) {
        print("<ul id=\"$type\">");
        $width = 1 / count($nav) * 100;
        foreach ($nav as $link => $name) {
            $current = $GLOBALS["section"] == $link ? " is-current" : "";
            print("<li class=\"$type-item$current\" style=\"width: $width%\"><a class=\"$type-item-link\" href=\"$link\">$name</a></li>");
        }
        print("</ul>");
    }
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
                    07752 185 557<br />
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
            <?php
                $nav = array(
                    "lessons" => "French Lessons",
                    "library" => "Library",
                    "resources" => "Resources",
                    "testimonials" => "Testimonials",
                    "other" => "Other Languages",
                    "contact" => "Contact Us"
                );
                print_nav("menu", $nav);

                $subnav = array(
                    "children" => "Group Classes for Young Children",
                    "adults" => "Group Classes for Adults",
                    "private" => "Private Classes for Adults &amp; Secondary Students",
                    "internet" => "Internet Teaching",
                    "business" => "Business French"
                );
                print_nav("submenu", $subnav);

                include("sections/$section.php");
            ?>
            <div style="clear:both"></div>
        </div>
    </body>
</html>
