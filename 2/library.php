<?php
    function nextday($day) {
        $today = strtotime(date("Y-m-d"));
        $next = strtotime("first $day");
        if ($today > $next) {
            $next = strtotime("first $day", strtotime("+ 1 month"));
        }
        return $next;
    }
?>
<div class="content-title"><img src="images/library.png" alt="Library" /></div>
<div class="content">
    <div class="left">
        <img class="title" src="images/chezsophie.png" alt="Chez Sophie" />
        <p>
            1st Tuesday of the Month<br />
            19:15 - 20:45
        </p>
        <p>
            3rd Friday of the Month<br />
            16:15 - 17:45
        </p>
        <br />
        <img src="images/library_logo.png" />
    </div>
    <div class="right" style="width: 500px">
        <p>
            We have a growing library of French books, and invite you to our 
            bi-monthly Open Session to borrow a book and to chat amicably with 
            fellow students and the Parlons Fran&ccedil;ais tutor(s). These are 
            informal sessions, providing an additional opportunity to practise 
            your french, without worrying about mistakes!
        </p>
        <p>
            Subscription to the club is &#163;5.00 per year (to cover the 
            administrative costs) and the entry fee to each meeting is 
            &#163;3.00 which includes a drink and the opportunity of up to 
            an hour-and-a-half&rsquo;s conversation and a book&hellip; 
            really good value, we're sure you will agree!
        </p>
        <p>
            The next Tuesday session is on <strong><?=date("l jS F", nextday("tuesday"))?></strong><br />
            The next Friday session is on <strong><?=date("l jS F", nextday("friday"))?></strong>
        </p>
        <p>
            Come when you want and stay as long or as little as you want! A 
            bient&ocirc;t!
        </p>
    </div>
</div>
