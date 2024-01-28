<header id="header_part" class="fixed fullwidth_block dashboard">
    <div id="header" class="not-sticky">
        <div class="container">
            <div class="utf_left_side">
                <div id="logo"> <a href="/"><img src="images/logo.png" alt=""></a> <a
                        href="/" class="dashboard-logo"><img src="images/logo.png" alt=""></a>
                </div>
                <div class="mmenu-trigger">
                    <button class="hamburger utfbutton_collapse" type="button">
                        <span class="utf_inner_button_box">
                            <span class="utf_inner_section"></span>
                        </span>
                    </button>
                </div>
                <nav id="navigation" class="style_one">
                    <ul id="responsive">
                        <li><a class="{{ (request()-> is('/')) ? 'current' : '' }}" href="/">{{ getNT('site.home') }}</a></li>
                        <li><a class="{{ (request()-> is('listings')) ? 'current' : '' }}" href="/listings">{{ getNT('site.listings') }}</a></li>
                        <li><a class="{{ (request()-> is('blog')) ? 'current' : '' }}" href="/blog">{{ getNT('site.blog') }}</a></li>
                        <li><a href="#">{{ getNT('site.pages') }}</a>
                            <ul>
                                <li><a class="{{ (request()-> is('about')) ? 'current' : '' }}" href="/about">{{ getNT('site.about') }}</a></li>
                                <li><a class="{{ (request()-> is('faq')) ? 'current' : '' }}" href="/faq">{{ getNT('site.faq') }}</a></li>
                                <li><a class="{{ (request()-> is('contact')) ? 'current' : '' }}" href="/contact">{{ getNT('site.contacts') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="clearfix"></div>
            </div>
            <div class="utf_right_side">
                <div class="header_widget">
                    <!--<div class="dashboard_header_button_item has-noti js-item-menu">-->
                    <!--    <i class="sl sl-icon-bell"></i>-->
                    <!--    <div class="dashboard_notifi_dropdown js-dropdown">-->
                    <!--        <div class="dashboard_notifi_title">-->
                    <!--            <p>You Have 2 Notifications</p>-->
                    <!--        </div>-->
                    <!--        <div class="dashboard_notifi_item">-->
                    <!--            <div class="bg-c1 red">-->
                    <!--                <i class="fa fa-check"></i>-->
                    <!--            </div>-->
                    <!--            <div class="content">-->
                    <!--                <p>Your Listing <b>Burger House (MG Road)</b> Has Been Approved!</p>-->
                    <!--                <span class="date">2 hours ago</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="dashboard_notifi_item">-->
                    <!--            <div class="bg-c1 green">-->
                    <!--                <i class="fa fa-envelope"></i>-->
                    <!--            </div>-->
                    <!--            <div class="content">-->
                    <!--                <p>You Have 7 Unread Messages</p>-->
                    <!--                <span class="date">5 hours ago</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="dashboard_notify_bottom text-center pad-tb-20">-->
                    <!--            <a href="#">View All Notification</a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="utf_user_menu">

                        <div class="utf_user_name"><span><img src="{{Auth::user()->img??'images/dashboard-avatar.jpg'}}" alt=""></span>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="clearfix"></div>
