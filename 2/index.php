<?php
    include("db.php");

    $section = $_GET["s"];
    $subsection = $_GET["t"];
    if (!$section) {
        $section = "home";
    }

    $admin = strpos($_SERVER['REQUEST_URI'], "/admin") === 0;

    $nav = array(
        "home" => "About Us",
        "lessons" => "French Lessons",
        "meetthetutors" => "Meet The Tutors",
        "testimonials" => "Testimonials",
        "contact" => "Contact Us",
        "resources" => "Resources"
    );
    $subnavs = array(
        "lessons" => array(
            "children" => "Group Classes for Young Children",
            "adults" => "Group Classes for Adults",
            "private" => "Private Classes for Adults and Secondary Students",
            "internet" => "Internet Teaching"
        ),
        "resources" => array(
            "ks2" => "KS2 Teaching Resources",
            "media" => "French Media Guide"
        )
    );

    function content($section, $subsection=NULL) {
        $q = "SELECT body FROM content WHERE section='$section'";
        if ($subsection) {
            $q .= " AND subsection='$subsection'";
        }

        $result = mysql_query($q);
        $row = mysql_fetch_row($result);
        $body = $row[0];

        if ($GLOBALS["admin"]) {
            print "<form method=\"POST\">";
            print "<textarea name=\"body\" class=\"admin\">$body</textarea>";
            print "<button>Save</button>";
            print "</form>";
        } else {
            return $body;
        }
    }

    $body = mysql_escape_string($_POST["body"]);
    if ($body && $admin) {
        $q = "UPDATE content SET body='$body' WHERE section='$section'";
        $q .= " AND subsection='$subsection'";
        mysql_query($q);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
                if ($subsection) {
                    print($subnavs[$section][$subsection] . " | ");
                }
                print($nav[$section] . " |");
            ?>
            Parlons Fran&ccedil;ais
        </title>
        <base href="http://www.parlons-francais.co.uk/<?php if ($admin) echo "admin/"?>" />
        <meta name="description" content="French language courses taught by French people, Learn French with the French" />
        <meta name="keywords" content="french, group, france, classes, cheltenham, gloucester, translation, children, adults, internet, teaching, courses, tutoring">
        <link href="static/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
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
                <div id="fb">
                    <div class="fb-like" data-href="https://www.facebook.com/pages/Parlons-Francais/142365292611867" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
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
