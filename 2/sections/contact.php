<?php
    $message = $_POST['message'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    if ($message && $name && $email) {
        $pf_to = "info@parlons-francais.co.uk";
        $pf_subject = "Parlons Français web enquiry from $name";
        $pf_message =
"This enquiry is from $name ($email) via the Parlons Français web site.\r\n
=======================================\r\n\r\n
$message";
        mail($pf_to, $pf_subject, $pf_message, "Reply-To: $email");

        /*$subject = "Automatic message acknowledgement";
        $ack_message = """
            The following message has been sent from you to Parlons Français.\r\n
            (This acknowledgement is from an automatic service that does not accept replies).\r\n\r\n
            $message
        """;
        mail($email, $subject, $ack_message, "From: \"Parlons Francais\" <$to>");*/

        $sent = true;
    }
?>
<div class="content-header"><img src="static/images/contactus.png" alt="Contact Us" /></div>
<div class="content">
    <div class="left">
        <?php
            if ($sent) {
        ?>
        <p>Thank you for your message.</p>
        <p>We will reply as soon as possible.</p>
        <?php
            } else {
        ?>
        <form method="POST" id="contact-form">
            <textarea id="contact-form-message" placeholder="Write your message here" name="message" required></textarea>
            <label for="contact-form-name">Your name:</label><input id="contact-form-name" type="text" name="name" required />
            <label for="contact-form-email">Your e-mail address:</label><input id="contact-form-email" type="email" name="email" required />
            <input type="submit" value="Send" />
        </form>
        <?php
            }
        ?>
    </div>
    <div class="right">
        <div class="contact-info">
            <img class="contact-info-logo" src="static/images/phone.png" alt="Phone number" />
            <br />07752 185557
        </div>
        <div class="contact-info">
            <img class="contact-info-logo" src="static/images/email.png" alt="E-mail address" />
            <br />info@parlons-francais.co.uk
        </div>
        <div class="contact-info">
            <img class="contact-info-logo" src="static/images/post.png" alt="Home address" />
            12a Mayfield House<br />
            Lansdown Road<br />
            Cheltenham<br />
            GL50 2HZ
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script>
    $('#contact-form').validate({
        highlight: function () {}
    });
</script>
