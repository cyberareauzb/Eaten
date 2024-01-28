<!--================= Footer Area Start Here =================-->
<div id="footer" class="footer_sticky_part">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12 col-xs-12">
                <img src="/images/logo.png" style="width: 200px" alt="">
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <h4 style="color: #0c1347">EATEN.UZ</h4>
                <p>{{getNT('site.abouttextmain')}}</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <h4>Other Pages</h4>
                <ul class="social_footer_link">
                    <li><a href="/terms">{{ getNT('site.terms') }}</a></li>
                    <li><a href="/privacy">{{ getNT('site.privacy') }}</a></li>
                    <li><a class="{{ (request()-> is('about')) ? 'current' : '' }}"
                           href="/about">{{ getNT('site.about') }}</a></li>
                    <li><a class="{{ (request()-> is('faq')) ? 'current' : '' }}"
                           href="/faq">{{ getNT('site.faq') }}</a></li>
                    <li><a class="{{ (request()-> is('contact')) ? 'current' : '' }}"
                           href="/contact">{{ getNT('site.contacts') }}</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <h4>Main menu</h4>
                <ul class="social_footer_link">
                    <li><a class="{{ (request()-> is('/')) ? 'current' : '' }}" href="/">{{ getNT('site.home') }}</a>
                    </li>
                    <li><a class="{{ (request()-> is('listings')) ? 'current' : '' }}"
                           href="/listings">{{ getNT('site.listings') }}</a></li>
                    <li><a class="{{ (request()-> is('blog')) ? 'current' : '' }}"
                           href="/blog">{{ getNT('site.blog') }}</a></li>
                    <li><a class="{{ (request()-> is('foods')) ? 'current' : '' }}"
                           href="/foods">{{ getNT('site.foods') }}</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <h4>Social links</h4>
                <ul class="social_footer_link">
                    <li><a href="#"><i class="icon-facebook"></i> Facebook</a></li>
                    <li><a href="#"><i class="icon-linkedin"></i> Linkedin</a></li>
                    <li><a href="#"><i class="icon-instagram"></i> Instagram</a></li>
                    <li><a href="#"><i class="icon-youtube"></i> Youtube</a></li>
                </ul>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="footer_copyright_part">2023 SAMARQAND BIZNESS LOYIHALASH.</div>
            </div>
        </div>
    </div>
</div>
<div id="bottom_backto_top"><a href="#"></a></div>

<!--================= Footer Area End Here =================-->
