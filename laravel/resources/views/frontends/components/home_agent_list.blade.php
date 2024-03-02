<section>
    <div class="container">
        <!-- section-title -->
        <div class="section-title st-center fl-wrap">
            <h4>Đối tác Đà Lạt BDS</h4>
            <h2>Đối Tác Xuất Sắc</h2>
        </div>
        <!-- section-title end -->
        <div class="clearfix"></div>
        <div class="listing-carousel-wrapper lc_hero carousel-wrap fl-wrap">
            <div class="listing-carousel carousel ">
                @foreach(range(1, 6) as $index)
                <!-- slick-slide-item -->
                @include('frontends.components.home_agent_card')
                <!-- slick-slide-item end-->
                @endforeach
            </div>
            {{-- <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
            <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div> --}}
        </div>
    </div>
</section>
