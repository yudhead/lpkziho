<footer>
    <div class="vc_row wpb_row" style="text-align: center;">
        <section class="section grid_section"
            style="background-color: #2F3645; padding-top: 50px; padding-bottom: 0px;">
            <div class="section_inner clearfix">
                <div class="section_inner_margin clearfix">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="image responsive" style="text-align: center;">
                                <img src="{{ asset('assets/wp-content/uploads/foto/LOGO.png') }}"
                                    style="width: 100px; height: auto;" />
                            </div>
                            <!-- Kolom Peta Lokasi -->

                        </div>

                        <!-- Media Sosial -->
                        <div class="separator transparent" style="margin-top:40px;margin-bottom:0px;"></div>

                        <div class="wpb_wrapper">
                            <h2 style="color: #ffffff; text-align: center;">LPKS ZIHO KARYA JAYATI</h2>
                        </div>
                    </div>
                </div>

                <div class="separator transparent" style="margin-top:40px;margin-bottom:0px;"></div>

                <!-- <div class="wpb_row vc_row-fluid"> -->
                <div class="d-flex justify-content-center flex-row">
                    <div class="wpb_column vc_column_container vc_col-sm-6">

                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element">
                                    <h4 style="color: #ffffff;">IG : @lpks_zihokaryajayati</h4>
                                    <h4 style="color: #ffffff;">Email : zihokaryajayati@gmail.com</h4>
                                    <h4 style="color: #ffffff;">Whatsapp : +62 852-3012-0894</h4>
                                </div>
                            </div>
                        </div>

                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element">
                                    <ul class="list-inline social-list-default background-color social-hover-2 mt-2">
                                        <li class="list-inline-item"><a class="facebook" target="_blank"
                                                href="https://www.facebook.com/jogjahost.co.id"><i
                                                    class="fab fa-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a class="twitter" target="_blank"
                                                href="https://twitter.com/jogjahostcoid"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a class="youtube" target="_blank"
                                                href="https://www.youtube.com/channel/UCNjzg7FZMoDlHQRvztXTZQA/featured"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <li class="list-inline-item"><a class="instagram" target="_blank"
                                                href="https://www.instagram.com/jogjahostcoid/"><i
                                                    class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>

                <div class="separator transparent" style="margin-top:80px;margin-bottom:0px;"></div>

                <div class="wpb_column vc_column_container vc_col-md-12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper" style="text-align: center;">
                            <h3 style="color: #ffffff;" class="vc_custom_heading"><strong>LOKASI KAMI</strong></h3>
                            <div class="separator normal"
                                style="margin: 10px auto; width: 50px; background-color: #ffffff;"></div>
                            <!-- Map Container -->
                            <div id="map" style="width: 100%; height: 350px;"></div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Google Maps JavaScript API -->
            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
            <script>
                function initMap() {
                    var location = {
                        lat: -7.828558,
                        lng: 111.997995
                    }; // Ganti dengan koordinat lokasi kamu

                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: location
                    });
                    var marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                }

                // Initialize the map when the window loads
                window.onload = initMap;
            </script>

            <!-- Bagian bawah footer -->
            <div class="footer_bottom_holder">
                <div class="footer_bottom"
                    style="background-color: rgba(151, 7, 7, 0.781);display: flex; flex-direction: column;">
                    <div class="textwidget"><span>&copy; 2024 All Rights Reserved. by <a href=""
                                style="color: white; text-decoration: underline;">Solusi Sistem Informasi |
                                POLINEMA</a>.</span></div>
                </div>
            </div>
        </section>
    </div>

</footer>
