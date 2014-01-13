<div class="content">
    <div class="box left">
        <img class="box-logo" src="static/images/aboutus_logo.png" alt="About Us" />
        <img class="box-title" src="static/images/aboutus.png" alt="About Us" />
        <?=content("home", "about")?>
    </div>
    <div class="box right">
        <img class="box-logo" src="static/images/wlwu_logo.png" alt="Why Learn With Us" />
        <img class="box-title" src="static/images/wlwu.png"  alt="Why Learn With Us" />
        <?=content("home", "why")?>
    </div>
</div>
<div class="content">
    <img class="content-logo" src="static/images/testimonials_logo.png" alt="Testimonials" />
    <img class="content-title" src="static/images/testimonials.png" alt="Testimonials" />
    <?php
        $result = mysql_query("SELECT name, testimonial FROM testimonials ORDER BY time DESC LIMIT 2");
        $one = mysql_fetch_assoc($result);
        $two = mysql_fetch_assoc($result);
    ?>
    <div class="quote left">
        <img class="quote-ldquo" src="static/images/quote_left.png" />
        <?=$one["testimonial"]?><br /><br />
        - <?=$one["name"]?>
        <img class="quote-rdquo" src="static/images/quote_right.png" />
    </div>
    <div class="quote right">
        <img class="quote-ldquo" src="static/images/quote_left.png" />
        <?=$two["testimonial"]?><br /><br />
        - <?=$two["name"]?>
        <img class="quote-rdquo" src="static/images/quote_right.png" />
    </div>
    <a class="content-button" style="clear: both" href="testimonials">More Testimonials</a>
</div>
