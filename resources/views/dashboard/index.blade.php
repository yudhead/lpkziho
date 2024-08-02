@extends('layout.index_dashboard')

@section('content')
    <script>
        var page_scroll_amount_for_sticky = 550;
    </script>

    <div class="q_slider">
        <div class="q_slider_inner">
        </div>

        {{-- <div class="full_width">
        <div class="image responsive" style="display:flex; justify-content:center;">
    <img src="{{ asset('assets/wp-content/uploads/foto/LPKS.png') }}" style="width: 100%; height: auto;" />
</div> --}}
            <div class="full_width_inner">
                <div class="vc_row wpb_row " style="text-align:left;">
                    <section class="section  grid_section" style=' padding-top:100px; padding-bottom:87px;'>
                        <div class="section_inner clearfix">
                            <div class='section_inner_margin clearfix'>
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">

                                                    <br>
                                                    <h2 style="text-align: center;"><span
                                                            style="color: #000000; text-align: center;">Program Pelatihan
                                                            </span></h2>
                                                </div>
                                            </div>
                                            <div class="vc_empty_space" style="height: 32px"><span
                                                    class="vc_empty_space_inner"></span></div>
                                            <div class="vc_row wpb_row vc_inner " style="text-align:left;">
                                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class='q_icon_with_title large  circle'>
                                                                <div class="icon_holder q_icon_animation"
                                                                    style=" transition-delay: 200ms; -webkit-transition-delay: 200ms; -moz-transition-delay: 200ms; -o-transition-delay: 200ms;">
                                                                    <span class="fa-stack fa-4x "
                                                                        style="font-size: 52px;"><i
                                                                            class="fa fa-circle fa-stack-base fa-stack-2x"
                                                                            style="color: #ffffff;"></i><i
                                                                            class="fa fa-cutlery fa-stack-1x"
                                                                            style=""></i></span>
                                                                </div>
                                                                <div class="icon_text_holder">
                                                                    <div class="icon_text_inner" style="">
                                                                        <h4 class="icon_title" style="">
                                                                            Modern Food</h4>
                                                                        <p style=''>Program Pelatihan ini
                                                                            mempelajari
                                                                            dan melatih ketrampilan di
                                                                            bidang Resto dan Kuliner untuk
                                                                            hidangan dengan tema campuran
                                                                            budaya.</p><a
                                                                            class='icon_with_title_link'
                                                                            href="{{ route('modern') }}"
                                                                            target='_self' style='color: ;'>Read More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class='q_icon_with_title large  circle'>
                                                                <div class="icon_holder q_icon_animation"
                                                                    style=" transition-delay: 400ms; -webkit-transition-delay: 400ms; -moz-transition-delay: 400ms; -o-transition-delay: 400ms;">
                                                                    <span class="fa-stack fa-4x "
                                                                        style="font-size: 52px;"><i
                                                                            class="fa fa-circle fa-stack-base fa-stack-2x"
                                                                            style="color: #ffffff;"></i><i
                                                                            class="fa fa-coffee fa-stack-1x"
                                                                            style=""></i></span>
                                                                </div>
                                                                <div class="icon_text_holder">
                                                                    <div class="icon_text_inner" style="">
                                                                        <h4 class="icon_title" style=""> Barista </h4>
                                                                        <p style=''>Program Pelatihan ini
                                                                            mempelajari dan melatih
                                                                            ketrampilan di bidang Bar
                                                                            dan olahan minuman.</p><a class='icon_with_title_link'
                                                                            href="{{ route('barista') }}"
                                                                            target='_self' style='color: ;'>Read
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vc_row wpb_row vc_inner " style="text-align:left;">
                                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class='q_icon_with_title large  circle'>
                                                                <div class="icon_holder q_icon_animation"
                                                                    style=" transition-delay: 200ms; -webkit-transition-delay: 200ms; -moz-transition-delay: 200ms; -o-transition-delay: 200ms;">
                                                                    <span class="fa-stack fa-4x "
                                                                        style="font-size: 52px;"><i
                                                                            class="fa fa-circle fa-stack-base fa-stack-2x"
                                                                            style="color: #ffffff;"></i><i
                                                                            class="fa fa-birthday-cake fa-stack-1x"
                                                                            style=""></i></span>
                                                                </div>
                                                                <div class="icon_text_holder">
                                                                    <div class="icon_text_inner" style="">
                                                                        <h4 class="icon_title" style="">
                                                                            Pastry &amp; Bakery</h4>
                                                                        <p style=''>Program Pelatihan ini
                                                                            mempelajari
                                                                            dan melatih ketrampilan di
                                                                            bidang Patisery dan Bakery</p><a
                                                                            class='icon_with_title_link'
                                                                            href="{{ route('bakery') }}"
                                                                            target='_self' style='color: ;'>Read
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class='q_icon_with_title large  circle'>
                                                                <div class="icon_holder q_icon_animation"
                                                                    style=" transition-delay: 400ms; -webkit-transition-delay: 400ms; -moz-transition-delay: 400ms; -o-transition-delay: 400ms;">
                                                                    <span class="fa-stack fa-4x "
                                                                        style="font-size: 52px;"><i
                                                                            class="fa fa-circle fa-stack-base fa-stack-2x"
                                                                            style="color: #ffffff;"></i><i
                                                                            class="fa fa-cutlery fa-stack-1x"
                                                                            style=""></i></span>
                                                                </div>
                                                                <div class="icon_text_holder">
                                                                    <div class="icon_text_inner" style="">
                                                                        <h4 class="icon_title" style="">Tradisional Food
                                                                            </h4>
                                                                        <p style=''>Program Pelatihan ini
                                                                            mempelajari
                                                                            dan melatih ketrampilan di
                                                                            bidang Tata Boga khusu untuk bidang
                                                                            kuliner olahan tradisional. </p><a
                                                                            class='icon_with_title_link'
                                                                            href="{{ route('tradisional') }}"
                                                                            target='_self' style='color: ;'>Read
                                                                            More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endsection