<?php 
  $url =  $_SERVER['REQUEST_URI'];
  $current = basename($url, ".php");
?>
<footer>
    <div class="footer__content">
    <div class="company__name">
        <h2>Holiday</h2>
        <span class="travel_title--footer"><b>Website</b></span>
        Deals
    </div>
    <div class="footer__sections">
        <div class="about">
        <h4>ABOUT</h4>
        <p>Company</p>
        <p>Careers</p>
        <p>Mobile</p>
        <p>Blog</p>
        </div>
        <div class="travel--info">
        <h4>TRAVEL INFORMATION</h4>
        <p>Travel updates</p>
        <p>Before you go</p>
        <p>Holiday information</p>
        <p>FAQs</p>
        <p>Customer support</p>
        </div>
        <div class="sections">
        <h4>SECTIONS</h4>
        <?php 
            if($current == 'home') {
                echo '<p class="explore">Explore Holidays</p>
                <p class="method">Travel Method</p>
                <p class="dest">Top Destinations</p>
                <p class="news">Newsletter</p>
                <p class="deals">Travel Deals</p>';
            }
            else {
                echo '<p class="about-us">About Us</p>
                <p class="priorities">Our Priorities</p>
                <p class="offer">What We Offer</p>
                <p class="our-location">Our Location</p>';
            }
        ?>
        
        </div>
        <div class="contact--us">
        <h4>CONTACT US</h4>
        <p>Help</p>
        <p>Press</p>
        <p>Partners</p>
        <p>Hotel Owners</p>
        </div>
    </div>
    </div>
    <div class="icons__enter--email">
    <div class="footer--icons">
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-google"></i>
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-youtube"></i>
    </div>
    <form class="enter--email">
        <input type="email" placeholder="Get the best offers" />
        <i class="fas fa-paper-plane"></i>
    </form>
    </div>
    <hr />
    <div class="conditions">
    <div class="privacy--conditions">
        <p>PRIVACY POLICY</p>
        <p>TERMS & CONDITIONS</p>
    </div>
    <p>HOLIDAY WEBSITE DEALS &copy; 2023</p>
    </div>
</footer>