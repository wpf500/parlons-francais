<?php
    $testimonial = mysql_escape_string($_POST['testimonial']);
    $name = mysql_escape_string($_POST['name']);
    $id = $_POST['id'];
    $new = isset($_POST['new']);

    if ($testimonial && $name && $admin) {
        if ($new) {
            mysql_query("INSERT INTO testimonials (name, testimonial) VALUES ('$name', '$testimonial')");
        } else {
            mysql_query("UPDATE testimonials SET name='$name', testimonial='$testimonial' WHERE id=$id");
        }
    }
?>
<div class="content-header"><img src="static/images/testimonials_page.png" alt="Testimonials" /></div>
<div class="content">
    <?php
        if ($admin) {
            $i = 1;
    ?>
    <div class="quote left">
        <img class="quote-ldquo" src="static/images/quote_left.png" />
        <form method="POST">
            <input type="hidden" name="new" />
            <textarea name="testimonial" class="admin" placeholder="New testimonial"></textarea>
            <input type="text" name="name" placeholder="Name" />
            <button>Save</button>
        </form>
        <img class="quote-rdquo" src="static/images/quote_right.png" />
    </div>
    <?php
        } else {
            $i = 0;
        }

        $result = mysql_query("SELECT id, name, testimonial FROM testimonials ORDER BY time DESC");
        while ($row = mysql_fetch_assoc($result)) {
            $class = ($i++ % 2) ? "right" : "left";
            print "<div class=\"quote $class\">";
            print "<img class=\"quote-ldquo\" src=\"static/images/quote_left.png\" />";
            if ($admin) {
                print "<form method=\"POST\">";
                print "<input type=\"hidden\" name=\"id\" value=\"$row[id]\" />";
                print "<textarea name=\"testimonial\" class=\"admin\">";
                print $row["testimonial"];
                print "</textarea>";
                print "<input type=\"text\" name=\"name\" value=\"$row[name]\" />";
                print "<button>Save</button>";
                print "</form>";
            } else {
                print $row["testimonial"] . "<br /><br />- " . $row["name"];
            }
            print "<img class=\"quote-rdquo\" src=\"static/images/quote_right.png\" />";
            print "</div>";
        }
    ?>
</div>
