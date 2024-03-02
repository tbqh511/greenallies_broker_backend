<section class="gray-bg small-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="section-title fl-wrap">
                    <h4>Bất động sản hấp dẫn</h4>
                    <h2>Bất động sản mới nhất</h2>
                </div>
            </div>
            <div class="col-md-8">
                {{-- <div class="listing-filters gallery-filters">
                    <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*"> <span>Tất cả</span></a>
                    <a href="#" class="gallery-filter" data-filter=".for_sale"> <span>Nhà bán</span></a>
                    <a href="#" class="gallery-filter" data-filter=".for_rent"> <span>Đất bán</span></a>
                </div> --}}
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- grid-item-holder-->
        <div class="grid-item-holder gallery-items gisp fl-wrap">
            {{-- @foreach($newestProducts as $newestProduct)
            <!-- gallery-item-->
            <div class="gallery-item for_sale">
                <!-- listing-item -->
                @include('frontends.components.product_card',['product'=>$newestProduct])
                <!-- listing-item end-->
            </div>
            <!-- gallery-item end-->
            @endforeach --}}
        </div>
        <!-- grid-item-holder-->
        <a href="/nha-ban" class="btn float-btn small-btn color-bg">Xem thêm</a>
    </div>
</section>
