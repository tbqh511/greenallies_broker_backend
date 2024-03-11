@php
\Carbon\Carbon::setLocale('vi');
$formatter = new \NumberFormatter('vi_VN', \NumberFormatter::CURRENCY);

$price = $productCard->price;
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
            {{-- <a href="{{ route('product.show', ['slug' => $productCard->slug]) }}" class="geodir-category-img_item">
                --}}
                <a href="" class="geodir-category-img_item">
                    <img src="{{$productCard->title_image}}" alt="">
                    <div class="overlay"></div>
                </a>
                <div class="geodir-category-location">
                    <a href="#"><i class="fas fa-map-marker-alt"></i>
                        <span>
                            {{ optional($productCard->street)->street_name }}, {{optional
                            ($productCard->ward)->name}}
                        </span></a>
                </div>
                <ul class="list-single-opt_header_cat">
                    <li><a href="#" class="cat-opt blue-bg">{{ $productCard->category->category }}</a></li>
                    <li><a href="#" class="cat-opt color-bg">{{ $productCard->created_at->diffForHumans() }}</a></li>
                </ul>
                {{-- <a href="#" class="geodir_save-btn tolt" data-microtip-position="left" data-tooltip="Save"><span><i
                            class="fal fa-heart"></i></span></a>
                <a href="#" class="compare-btn tolt" data-microtip-position="left" f data-tooltip="Compare"><span><i
                            class="fal fa-random"></i></span></a> --}}
                <div class="geodir-category-listing_media-list">
                    <span><i class="fas fa-camera"></i> {{$productCard->imagesCount}}</span>
                </div>
        </div>
        <div class="geodir-category-content fl-wrap">
            <h3 class="title-sin_item">
                {{-- <a href="{{ route('product.show', ['slug' => $productCard->slug]) }}">{{$productCard->title}}</a>
                --}}
                @if($productCard->propery_type == 0)
                <a href="">{{"Bán " . $productCard->category->category}}, {{ optional($productCard->street)->street_name
                    }}, {{optional($productCard->ward)->name}} , Tp Đà Lạt</a>
                @elseif($productCard->propery_type == 1)
                <a href="">{{"Cho thuê " . $productCard->category->category}}, {{
                    optional($productCard->street)->street_name }}, {{optional($productCard->ward)->name}}</a>
                @endif
            </h3>
            <div class="geodir-category-content_price">{{ $formattedPrice }}</div>
            <p> {{$productCard->description}}</p>
            <div class="geodir-category-content-details">
                {{-- <ul> --}}
                    {{-- <li><i class="fal fa-bed"></i><span>3</span></li>
                    <li><i class="fal fa-bath"></i><span>2</span></li> --}}
                    {{-- <li><i class="fal fa-cube"></i><span>{{ number_format($productCard->area) }} m²</span></li> --}}

                {{-- </ul> --}}
                <ul>
                    @php
                        // Lọc ra parameter có tên là 'diện tích'
                        $areaParameter = $productCard->parameters->where('id', '15')->first();
                
                        // Lọc ra hai parameter khác
                        $otherParameters = $productCard->parameters->reject(function ($parameter) {
                            return $parameter->name === 'diện tích';
                        })->take(2);
                    @endphp
                
                    {{-- Hiển thị 'diện tích' --}}
                    @if($areaParameter)
                        <li><i class="fal fa-cube"></i><span>{{ number_format($areaParameter->value) }} m²</span></li>
                    @endif
                
                    {{-- Hiển thị hai parameter khác --}}
                    @foreach($otherParameters as $parameter)
                        <li><i class="fal fa-bed"></i><span>{{ $parameter->value }}</span></li>
                    @endforeach
                </ul>
            </div>
            <div class="geodir-category-footer fl-wrap">
                <a href="agent-single.html" class="gcf-company"><img src="{{$productCard->agent ? ($productCard->agent->profile?$productCard->agent->profile:'https://dalatbds.com/images/users/1693209486.1303.jpg'):'https://dalatbds.com/images/users/1693209486.1303.jpg'}}"
                        alt="Đà Lạt BDS"><span>{{ $productCard->agent ? ($productCard->agent->name ?: 'Đà Lạt BDS') : 'Đà Lạt BDS' }}</span></a>
                <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good"
                    data-starrating2="5"></div>
            </div>
        </div>
    </article>
</div>