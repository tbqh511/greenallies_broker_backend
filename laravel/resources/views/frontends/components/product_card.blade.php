@php
// \Carbon\Carbon::setLocale('vi');
// $formatter = new \NumberFormatter('vi_VN', \NumberFormatter::CURRENCY);

// $price = $product->prices;
// $ty = 1000000000;
// $trieu = 1000000;

// if ($price > $ty) {
//     if ($price % $ty == 0 ) {
//     $formattedPrice = number_format($price / $ty, 0) . ' tỷ';
//     }
//     else {
//     $formattedPrice = number_format($price / $ty, 1) . ' tỷ';
//     }
// } elseif ($price > 0) {
//     $formattedPrice = number_format($price / $trieu, 0) . ' triệu';
// } else {
//     $formattedPrice = 'Giá thỏa thuận';
// }
@endphp

<div class="listing-item">
    <article class="geodir-category-listing fl-wrap">
        <div class="geodir-category-img fl-wrap">
            <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="geodir-category-img_item">
                <img src="{{asset('/images/bg/1.jpg')}}" alt="">
                <div class="overlay"></div>
            </a>
            <div class="geodir-category-location">
                <a href="#"><i class="fas fa-map-marker-alt"></i>
                    <span>
                        {{ optional($product->locationsStreet)->street_name }}, {{optional
                        ($product->locationsWard)->name}}
                    </span></a>
            </div>
            <ul class="list-single-opt_header_cat">
                <li><a href="#" class="cat-opt blue-bg">Nhà bán</a></li>
                <li><a href="#" class="cat-opt color-bg">{{ $product->created_at->diffForHumans() }}</a></li>
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
            </h3>  
            <div class="geodir-category-content_price">{{ $formattedPrice }}</div>
            <p>{{$product->description}}</p>
            <div class="geodir-category-content-details">
                <ul>
                    {{-- <li><i class="fal fa-bed"></i><span>3</span></li>
                    <li><i class="fal fa-bath"></i><span>2</span></li> --}}
                    <li><i class="fal fa-cube"></i><span>{{ number_format($product->area) }} m²</span></li>

                </ul>
            </div>
            <div class="geodir-category-footer fl-wrap">
                <a href="agent-single.html" class="gcf-company"><img src="{{asset('https://i.pravatar.cc/40')}}"
                        alt=""><span>Johnny
                        Trí Nguyễn</span></a>
                <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good"
                    data-starrating2="4"></div>
            </div>
        </div>
    </article>
</div>
