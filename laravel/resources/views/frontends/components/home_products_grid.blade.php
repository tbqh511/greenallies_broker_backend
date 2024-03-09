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
                <div class="listing-filters gallery-filters">
                    <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*"> <span>Tất cả</span></a>
                    <a href="#" class="gallery-filter" data-filter=".for_sale"> <span>Bán</span></a>
                    <a href="#" class="gallery-filter" data-filter=".for_rent"> <span>Cho thuê</span></a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- grid-item-holder-->
        <div class="grid-item-holder gallery-items gisp fl-wrap">
            @foreach($newestProducts as $newestProduct)
            <!-- gallery-item-->
            <div class="gallery-item for_sale">
                <!-- listing-item -->
                {{-- @include('frontends.components.product_card',['product'=>$newestProduct]) --}}
                @php
\Carbon\Carbon::setLocale('vi');
$formatter = new \NumberFormatter('vi_VN', \NumberFormatter::CURRENCY);

$price = $newestProduct->price;
$ty = 1000000000;
$trieu = 1000000;

if ($price > $ty) {
if ($price % $ty == 0 ) {
$formattedPrice = number_format($price / $ty, 0) . ' tỷ';
}
else {
$formattedPrice = number_format($price / $ty, 1) . ' tỷ';
}
} elseif ($price > 0) {
$formattedPrice = number_format($price / $trieu, 0) . ' triệu';
} else {
$formattedPrice = 'Giá thỏa thuận';
}
@endphp

<div class="listing-item">
    <article class="geodir-category-listing fl-wrap">
        <div class="geodir-category-img fl-wrap">
            {{-- <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="geodir-category-img_item">
                --}}
                <a href="" class="geodir-category-img_item">
                    <img src="{{$newestProduct->title_image}}" alt="">
                    <div class="overlay"></div>
                </a>
                <div class="geodir-category-location">
                    <a href="#"><i class="fas fa-map-marker-alt"></i>
                        <span>
                            {{ optional($newestProduct->locationsStreet)->street_name }}, {{optional
                            ($newestProduct->locationsWard)->name}}
                        </span></a>
                </div>
                <ul class="list-single-opt_header_cat">
                    <li><a href="#" class="cat-opt blue-bg">{{ $newestProduct->category->category }}</a></li>
                    <li><a href="#" class="cat-opt color-bg">{{ $newestProduct->created_at->diffForHumans() }}</a></li>
                </ul>
                {{-- <a href="#" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Save"><span><i
                            class="fal fa-heart"></i></span></a>
                <a href="#" class="compare-btn tolt" data-microtip-position="left" f data-tooltip="Compare"><span><i
                            class="fal fa-random"></i></span></a> --}}
                <div class="geodir-category-listing_media-list">
                    <span><i class="fas fa-camera"></i> 8</span>
                </div>
        </div>
        <div class="geodir-category-content fl-wrap">
            <h3 class="title-sin_item">
                {{-- <a href="{{ route('product.show', ['slug' => $product->slug]) }}">{{$product->title}}</a> --}}
                <a href="">{{$newestProduct->title}}</a>
            </h3>
            <div class="geodir-category-content_price">{{ $formattedPrice }}</div>
            <p> {{$newestProduct->title}} & {{$newestProduct->description}}</p>
            <div class="geodir-category-content-details">
                <ul>
                    {{-- <li><i class="fal fa-bed"></i><span>3</span></li>
                    <li><i class="fal fa-bath"></i><span>2</span></li> --}}
                    <li><i class="fal fa-cube"></i><span>{{ number_format($newestProduct->area) }} m²</span></li>

                </ul>
            </div>
            <div class="geodir-category-footer fl-wrap">
                <a href="agent-single.html" class="gcf-company"><img src="{{asset('https://i.pravatar.cc/40')}}"
                        alt=""><span>{{$newestProduct->title}}</span></a>
                <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good"
                    data-starrating2="4"></div>
            </div>
        </div>
    </article>
</div>
                <!-- listing-item end-->
            </div>
            <!-- gallery-item end-->
            @endforeach
        </div>
        <!-- grid-item-holder-->
        <a href="/nha-ban" class="btn float-btn small-btn color-bg">Xem thêm</a>
    </div>
</section>
