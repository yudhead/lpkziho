<header class="dark">
    <div class="header_inner clearfix">
        <div class="header_bottom clearfix">
            <div class="header_inner_left">
                <div class="mobile_menu_button"><span><i class="fa fa-bars"></i></span></div>
                <div class="logo_wrapper">
                </div>
            </div>
            <div class="header_inner_right">
                <div class="side_menu_button_wrapper right">
                    <div class="side_menu_button"></div>
                </div>
            </div>
            <nav class="main_menu drop_down right">
                <div></div>
                <ul id="menu-top_menu" class="">
                    <li id="nav-menu-item-7180"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-4699 current_page_item active narrow">
                        <a href="{{ route('home') }}" class=" current "><i
                                class="menu_icon fa blank"></i><span>HOME</span><i
                                class="q_menu_arrow fa fa-angle-right"></i></a>
                    </li>
                    <li id="nav-menu-item-7224"
                        class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children  has_sub narrow">
                        <a href="{{ route('profile') }}" class=""><i
                                class="menu_icon fa blank"></i><span>PROFILE</span><i
                                class="q_menu_arrow fa fa-angle-right"></i></a>
                    </li>
                    <li id="nav-menu-item-7211"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  has_sub narrow">
                        <a href="{{ route('program-pelatihan') }}" class=""><i
                                class="menu_icon fa blank"></i><span>PROGRAM
                                PELATIHAN</span><i class="q_menu_arrow fa fa-angle-right"></i></a>
                        <div class="second">
                            <div class="inner">
                                <ul>
                                    <li id="nav-menu-item-7217"
                                        class="menu-item menu-item-type-post_type menu-item-object-page ">
                                        <a href="{{ route('bakery') }}" class=""><i
                                                class="menu_icon fa blank"></i><span> TATA BOGA
                                                PASTRY & BAKERY
                                            </span><i class="q_menu_arrow fa fa-angle-right"></i></a>
                                    </li>
                                    <li id="nav-menu-item-7216"
                                        class="menu-item menu-item-type-post_type menu-item-object-page ">
                                        <a href="{{ route('modern') }}" class=""><i
                                                class="menu_icon fa blank"></i><span>TATA BOGA
                                                MODERN/FUSION FOOD
                                            </span><i class="q_menu_arrow fa fa-angle-right"></i></a>
                                    </li>
                                    <li id="nav-menu-item-7215"
                                        class="menu-item menu-item-type-post_type menu-item-object-page ">
                                        <a href="{{ route('tradisional') }}" class=""><i
                                                class="menu_icon fa blank"></i><span> TATA BOGA TRADISIONAL
                                                FOOD</span><i class="q_menu_arrow fa fa-angle-right"></i></a>
                                    </li>
                                    <li id="nav-menu-item-7214"
                                        class="menu-item menu-item-type-post_type menu-item-object-page ">
                                        <a href="{{ route('barista') }}" class=""><i
                                                class="menu_icon fa blank"></i><span>BARISTA</span><i
                                                class="q_menu_arrow fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li id="nav-menu-item-7224"
                        class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children  has_sub narrow">
                        <a href="{{ route('informasi') }}" class=""><i
                                class="menu_icon fa blank"></i><span>INFORMASI</span><i
                                class="q_menu_arrow fa fa-angle-right"></i></a>
                    </li>

                    <li id="nav-menu-item-7224"
                        class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children  has_sub narrow">
                        <a href="{{ route('kontak') }}" class=""><i
                                class="menu_icon fa blank"></i><span>KONTAK</span><i
                                class="q_menu_arrow fa fa-angle-right"></i></a>

                    <li id="nav-menu-item-7224"
                        class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children  has_sub narrow">
                        <a href="{{ route('pendaftaran') }}" class=""><i
                                class="menu_icon fa blank"></i><span>PENDAFTARAN</span><i
                                class="q_menu_arrow fa fa-angle-right"></i></a>

                    <li id="nav-menu-item-7224"
                        class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children  has_sub narrow">
                        <a href="{{ url('login') }}" class=""><i
                                class="menu_icon fa blank"></i><span>LOGIN</span><i
                                class="q_menu_arrow fa fa-angle-right"></i></a>

                </ul>
            </nav>
            <nav class="mobile_menu">
                <ul id="menu-top_menu-1" class="">
                    <li id="mobile-menu-item-7180"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-4699 current_page_item active">
                        <a href="{{ route('home') }}" class=" current "><span>Home</span><span class="mobile_arrow"><i
                                    class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></span></a>
                    </li>
                    <li id="mobile-menu-item-7188"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  has_sub">
                        <a href="{{ route('profile') }}" class=""><span>PROFIL</span></a>
                    </li>
                    <li id="mobile-menu-item-7211"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  has_sub">
                        <a href="{{ route('program-pelatihan') }}" class=""><span>PROGRAM PELATIHAN</span><span
                                class="mobile_arrow"><i class="fa fa-angle-right"></i><i
                                    class="fa fa-angle-down"></i></span></a>
                        <ul class="sub_menu">
                            <li id="mobile-menu-item-7217"
                                class="menu-item menu-item-type-post_type menu-item-object-page ">
                                <a href="{{ route('bakery') }}" class=""><i
                                        class="menu_icon fa blank"></i><span> TATA BOGA PASTRY
                                        & BAKERY
                                    </span></a>
                            </li>
                            <li id="mobile-menu-item-7216"
                                class="menu-item menu-item-type-post_type menu-item-object-page "><a
                                    href="{{ route('modern') }}" class=""><span>FOOD &#038;
                                        BEVERAGE</span><span class="mobile_arrow"><i class="fa fa-angle-right"></i><i
                                            class="fa fa-angle-down"></i></span></a></li>
                            <li id="mobile-menu-item-7215"
                                class="menu-item menu-item-type-post_type menu-item-object-page "><a
                                    href="program-studi/room-division/index.html" class=""><span>ROOM
                                        DIVISION</span><span class="mobile_arrow"><i class="fa fa-angle-right"></i>
                                        <iclass="fa fa-angle-down">
                                        </iclass=>
                                    </span></a></li>
                            <li id="mobile-menu-item-7214"
                                class="menu-item menu-item-type-post_type menu-item-object-page "><a
                                    href="program-studi/pastry-bakery/index.html" class=""><span>PASTRY
                                        BAKERY</span><span class="mobile_arrow"><i class="fa fa-angle-right"></i><i
                                            class="fa fa-angle-down"></i></span></a></li>
                        </ul>
                    </li>
                    <li id="mobile-menu-item-7239" class="menu-item menu-item-type-post_type menu-item-object-page ">
                        <a href="contact/index.html" class=""><span>KONTAK</span><span class="mobile_arrow"><i
                                    class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></span></a>
                    </li>

                    <li id="mobile-menu-item-7239" class="menu-item menu-item-type-post_type menu-item-object-page ">
                        <a href="{{ route('informasi') }}" class=""><span>INFORMASI</span><span
                                class="mobile_arrow"><i class="fa fa-angle-right"></i><i
                                    class="fa fa-angle-down"></i></span></a>
                    </li>

                    <li id="mobile-menu-item-7964" class="menu-item menu-item-type-custom menu-item-object-custom "><a
                            target="_blank" href="{{ route('pendaftaran') }}"
                            class=""><span>PENDAFTARAN</span><span class="mobile_arrow"><i
                                    class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></span></a></li>
                    <li id="mobile-menu-item-7964" class="menu-item menu-item-type-custom menu-item-object-custom "><a
                            target="_blank" href="{{ url('login') }}" class=""><span>LOGIN</span><span
                                class="mobile_arrow"><i class="fa fa-angle-right"></i><i
                                    class="fa fa-angle-down"></i></span></a></li>


                </ul>
            </nav>
        </div>
    </div>
</header>
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-46439414-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
