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
@extends('frontends.master')
@section('content')
<div class="content">
    <!--  carousel-->
    @include('frontends.components.product_slider')
    <!--  carousel  end-->
    <div class="breadcrumbs fw-breadcrumbs smpar fl-wrap">
        <div class="container">
            <div class="breadcrumbs-list">
                <a href="#">Trang chủ</a><a href="#">Phường 7</a>
            </div>
            {{-- <div class="show-more-snopt smact"><i class="fal fa-ellipsis-v"></i></div>
            <div class="show-more-snopt-tooltip">
                <a href="#sec15" class="custom-scroll-link"> <i class="fas fa-comment-alt"></i> Write a review</a>
                <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
            </div> --}}
            <a class="print-btn tolt" href="javascript:window.print()" data-microtip-position="bottom"
                data-tooltip="Print"><i class="fas fa-print"></i></a>
            {{-- <a class="compare-top-btn tolt" data-microtip-position="bottom" data-tooltip="Compare" href="#"><i
                    class="fas fa-random"></i></a>
            <div class="like-btn"><i class="fas fa-heart"></i> Save</div> --}}
        </div>
    </div>
    <div class="gray-bg small-padding fl-wrap">
        <div class="container">
            <div class="row">

                <!--  listing-single content -->
                <div class="col-md-8">
                    <div class="list-single-main-wrapper fl-wrap">
                        <!--  scroll-nav-wrap -->
                        <div class="scroll-nav-wrap">
                            <nav class="scroll-nav scroll-init fixed-column_menu-init">
                                <ul class="no-list-style">
                                    <li><a class="act-scrlink" href="#sec1"><i class="fal fa-image"></i></a><span>Hình</span></li>
                                    <li><a href="#sec2"><i class="fal fa-info"></i> </a><span>Thông</span></li>
                                    <li><a href="#sec3"><i class="fal fa-stars"></i></a><span>Features</span></li>
                                    <li><a href="#sec4"><i class="fal fa-video"></i></a><span>Video</span></li>
                                    <li><a href="#sec5"><i class="fal fa-map-pin"></i></a><span>Location</span></li>
                                    <li><a href="#sec6"><i class="fal fa-comment-alt-lines"></i></a><span>Reviews</span>
                                    </li>
                                </ul>
                                <div class="progress-indicator">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                                        <circle cx="16" cy="16" r="15.9155" class="progress-bar__background" />
                                        <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress
                                            js-progress-bar" />
                                    </svg>
                                </div>
                            </nav>
                        </div>
                        <!--  scroll-nav-wrap end-->
                        <!--  list-single-opt_header-->
                        <div class="list-single-opt_header fl-wrap">
                            <ul class="list-single-opt_header_cat">
                                <li><a href="#" class="cat-opt color-bg">Nhà bán</a></li>
                                <li><a href="#" class="cat-opt color-bg">{{ $product->created_at->diffForHumans() }}</a></li>
                            </ul>
                            <div class="share-holder hid-share">
                                <a href="#" class="share-btn showshare sfcs"> <i class="fas fa-share-alt"></i> Chia sẻ</a>
                                <div class="share-container  isShare"></div>
                            </div>
                        </div>
                        <!--  list-single-opt_header end -->
                        <!--  list-single-header-item-->
                        <div class="list-single-header-item  fl-wrap" id="sec2">
                            <div class="row">
                                <div class="col-md-8">
                                    <h1>{{$product->title}}<span class="verified-badge tolt"
                                            data-microtip-position="bottom" data-tooltip="Đã xác thực"><i
                                                class="fas fa-check"></i></span></h1>
                                    <div class="geodir-category-location fl-wrap">
                                        <a href="#"><i class="fas fa-map-marker-alt"></i> {{ optional($product->locationsStreet)->street_name }}, {{optional ($product->locationsWard)->name}}</a>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span
                                                class="re_stars-title">Tốt</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="host-avatar-wrap" href="agent-single.html">
                                        <span>Johny Trí Nguyễn</span>
                                        <img src="{{asset('images/avatar/1.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="list-single-header-footer fl-wrap">
                                <div class="list-single-header-price" data-propertyprise="50500">
                                    {{-- <strong>Giá:</strong>{{ $formattedPrice }}</div> --}}
                                <div class="list-single-header-date"><span>Ngày đăng:</span>{{$product->created_at->format('d/m/Y H:i:s')}}</div>
                                <div class="list-single-stats">
                                    <ul class="no-list-style">
                                        <li><span class="viewed-counter"><i class="fas fa-eye"></i> Đã xem - 156 </span>
                                        </li>
                                        <li><span class="bookmark-counter"><i class="fas fa-heart"></i> Đă lưu - 24
                                            </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="list-single-facts fl-wrap">
                            <!-- inline-facts -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <i class="fal fa-home-lg"></i>
                                    <h6>Type</h6>
                                    <span>Apartment/ House</span>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <i class="fal fa-users"></i>
                                    <h6>Accomodation</h6>
                                    <span>6 Guest</span>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <i class="fal fa-bed"></i>
                                    <h6>Bedrooms</h6>
                                    <span>3 Bedrooms / 4 Beds</span>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <i class="fal fa-bath"></i>
                                    <h6>Bathrooms</h6>
                                    <span>3 Full</span>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                        </div> --}}
                        <div class="list-single-main-container fl-wrap">
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title">
                                    <h3>Thông tin</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <p>{{$product->description}}</p>
                                    {{-- <a href="#" class="btn float-btn color-bg">Visit Website</a> --}}
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap" id="sec3">
                                <div class="list-single-main-item-title">
                                    <h3>Chi tiết</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="details-list">
                                        <ul>
                                            <li><span>Id:</span>154</li>
                                            <li><span>Property Lot Size:</span>850 m²</li>
                                            <li><span>Bathrooms:</span>4</li>
                                            <li><span>Rooms:</span>8</li>
                                            <li><span>Bedrooms:</span>2</li>
                                            <li><span>Garage Size:</span>2 cars</li>
                                            <li><span>Available from:</span>25.05.2020</li>
                                            {{-- <li><span>Price:</span>{{$formattedPrice}}</li> --}}
                                            <li><span>Type:</span>Apartment/House</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            {{-- <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title">
                                    <h3>Floor Plans</h3>
                                </div>
                                <div class="accordion">
                                    <a class="toggle act-accordion" href="#"> First Floor Plan <strong>286 sq
                                            ft</strong> <span></span> </a>
                                    <div class="accordion-inner visible">
                                        <img src="images/plans/1.jpg" alt="">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                            neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla
                                            posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. .</p>
                                    </div>
                                    <a class="toggle" href="#">Second Floor Plan <strong>280 sq ft</strong>
                                        <span></span></a>
                                    <div class="accordion-inner">
                                        <img src="images/plans/1.jpg" alt="">
                                        <p>Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed
                                            tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a
                                            consequat purus viverra</p>
                                    </div>
                                    <a class="toggle" href="#"> Garage Plan <strong>180 sq ft</strong> <span></span></a>
                                    <div class="accordion-inner">
                                        <img src="images/plans/1.jpg" alt="">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor iaculis
                                            massa faucibus feugiat. In fermentum facilisis massa, a consequat purus
                                            viverra.</p>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap" id="sec4">
                                <div class="list-single-main-item-title">
                                    <h3>Video</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="video-box fl-wrap">
                                        <img src="{{asset('images/bg/1.jpg')}}" class="respimg" alt="">
                                        <a class="video-box-btn image-popup color-bg"
                                            href="https://vimeo.com/158059890"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            {{-- <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title">
                                    <h3>Features</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="listing-features ">
                                        <ul>
                                            <li><a href="#"><i class="fal fa-dumbbell"></i> Gym</a></li>
                                            <li><a href="#"><i class="fal fa-wifi"></i> Wi Fi</a></li>
                                            <li><a href="#"><i class="fal fa-parking"></i> Parking</a></li>
                                            <li><a href="#"><i class="fal fa-cloud"></i> Air Conditioned</a></li>
                                            <li><a href="#"><i class="fal fa-swimmer"></i> Pool</a></li>
                                            <li><a href="#"><i class="fal fa-cctv"></i> Security</a></li>
                                            <li><a href="#"><i class="fal fa-washer"></i> Laundry Room</a></li>
                                            <li><a href="#"><i class="fal fa-utensils"></i> Equipped Kitchen</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fw-lmi fl-wrap" id="sec5">
                                <div class="map-container mapC_vis mapC_vis2">
                                    <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"
                                        data-mapTitle="Our Location" data-infotitle="House in Financial Distric"
                                        data-infotext="70 Bright St New York, USA"></div>
                                    <div class="scrollContorl"></div>
                                </div>
                                <input id="pac-input" class="controls fl-wrap controls-mapwn" autocomplete="on"
                                    type="text" placeholder="What Nearby? Schools, Gym... " value="">
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            {{-- <div class="list-single-main-item fl-wrap" id="sec6">
                                <div class="list-single-main-item-title">
                                    <h3>Reviews <span>2</span></h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="reviews-comments-wrap fl-wrap">
                                        <div class="review-total">
                                            <span class="review-number blue-bg">4.0</span>
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span
                                                    class="re_stars-title">Good</span></div>
                                        </div>
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="images/avatar/1.jpg" alt="">
                                            </div>
                                            <div class="reviews-comments-item-text smpar">
                                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i>
                                                </div>
                                                <div class="show-more-snopt-tooltip bxwt">
                                                    <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                </div>
                                                <h4><a href="#">Liza Rose</a></h4>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="3">
                                                    <span class="re_stars-title">Average</span></div>
                                                <div class="clearfix"></div>
                                                <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                                                    sem. Nulla consequat massa quis enim. Donec pede justo, fringilla
                                                    vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut,
                                                    imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                                                    mollis pretium. "</p>
                                                <div class="reviews-comments-item-date"><span
                                                        class="reviews-comments-item-date-item"><i
                                                            class="far fa-calendar-check"></i>12 April 2018</span><a
                                                        href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>
                                                        Helpful Review <span>6</span> </a></div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="images/avatar/1.jpg" alt="">
                                            </div>
                                            <div class="reviews-comments-item-text smpar">
                                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i>
                                                </div>
                                                <div class="show-more-snopt-tooltip bxwt">
                                                    <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                </div>
                                                <h4><a href="#">Adam Koncy</a></h4>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                    <span class="re_stars-title">Excellent</span></div>
                                                <div class="clearfix"></div>
                                                <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
                                                    posuere convallis purus non cursus. Cras metus neque, gravida
                                                    sodales massa ut. "</p>
                                                <div class="reviews-comments-item-date"><span
                                                        class="reviews-comments-item-date-item"><i
                                                            class="far fa-calendar-check"></i>03 December 2017</span><a
                                                        href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>
                                                        Helpful Review <span>2</span> </a></div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
                                    </div>
                                </div>
                            </div> --}}
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            {{-- <div class="list-single-main-item fl-wrap" id="sec15">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Add Your Review</h3>
                                </div>
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">
                                    <div class="leave-rating-wrap">
                                        <span class="leave-rating-title">Your rating for this listing : </span>
                                        <div class="leave-rating">
                                            <input type="radio" data-ratingtext="Excellent" name="rating" id="rating-1"
                                                value="1" />
                                            <label for="rating-1" class="fal fa-star"></label>
                                            <input type="radio" data-ratingtext="Good" name="rating" id="rating-2"
                                                value="2" />
                                            <label for="rating-2" class="fal fa-star"></label>
                                            <input type="radio" name="rating" data-ratingtext="Average" id="rating-3"
                                                value="3" />
                                            <label for="rating-3" class="fal fa-star"></label>
                                            <input type="radio" data-ratingtext="Fair" name="rating" id="rating-4"
                                                value="4" />
                                            <label for="rating-4" class="fal fa-star"></label>
                                            <input type="radio" data-ratingtext="Very Bad " name="rating" id="rating-5"
                                                value="5" />
                                            <label for="rating-5" class="fal fa-star"></label>
                                        </div>
                                        <div class="count-radio-wrapper">
                                            <span id="count-checked-radio">Your Rating</span>
                                        </div>
                                    </div>
                                    <!-- Review Comment -->
                                    <form class="add-comment custom-form">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Your name* <span class="dec-icon"><i
                                                                class="fas fa-user"></i></span></label>
                                                    <input name="phone" type="text" onClick="this.select()" value="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Yourmail* <span class="dec-icon"><i
                                                                class="fas fa-envelope"></i></span></label>
                                                    <input name="reviewwname" type="text" onClick="this.select()"
                                                        value="">
                                                </div>
                                            </div>
                                            <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                        </fieldset>
                                        <button class="btn big-btn color-bg float-btn">Submit Review <i
                                                class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                                <!-- Add Review Box / End -->
                            </div> --}}
                            <!-- list-single-main-item end -->
                        </div>
                    </div>
                </div>
                <!-- listing-single content end-->
                <!-- sidebar -->
                <div class="col-md-4">
                    <!--box-widget-->
                    <div class="box-widget fl-wrap">
                        <div class="profile-widget">
                            <div class="profile-widget-header color-bg smpar fl-wrap">
                                <div class="pwh_bg"></div>
                                <div class="call-btn"><a href="tel:123-456-7890" class="tolt color-bg"
                                        data-microtip-position="right" data-tooltip="Gọi ngay"><i
                                            class="fas fa-phone-alt"></i></a></div>
                                {{--<div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                 <div class="show-more-snopt-tooltip bxwt">
                                    <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                </div> --}}
                                <div class="profile-widget-card">
                                    <div class="profile-widget-image">
                                        <img src="{{asset('images/avatar/1.jpg')}}" alt="">
                                    </div>
                                    <div class="profile-widget-header-title">
                                        <h4><a href="agent-single.html">Jessie Wilcox</a></h4>
                                        <div class="clearfix"></div>
                                        <div class="pwh_counter"><span>22</span>Property Listings</div>
                                        <div class="clearfix"></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-content fl-wrap">
                                {{-- <div class="contats-list fl-wrap">
                                    <ul class="no-list-style">
                                        <li><span><i class="fal fa-phone"></i> Phone :</span> <a
                                                href="#">+7(123)987654</a></li>
                                        <li><span><i class="fal fa-envelope"></i> Mail :</span> <a
                                                href="#">JessieWilcox@domain.com</a></li>
                                        <li><span><i class="fal fa-browser"></i> Website :</span> <a
                                                href="#">themeforest.net</a></li>
                                    </ul>
                                </div> --}}
                                {{-- <div class="profile-widget-footer fl-wrap">
                                    <a href="agent-single.html" class="btn float-btn color-bg small-btn">View
                                        Profile</a>
                                    <a href="#sec-contact" class="custom-scroll-link tolt" data-microtip-position="left"
                                        data-tooltip="Viewing Property"><i class="fal fa-paper-plane"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!--box-widget end -->
                    <!--box-widget-->
                    <div class="box-widget fl-wrap">
                        <div class="box-widget-title fl-wrap">Sản phẩm cùng vị trí</div>
                        <div class="box-widget-content fl-wrap">
                            <!--widget-posts-->
                            <div class="widget-posts  fl-wrap">
                                <ul class="no-list-style">
                                    <li>
                                        <div class="widget-posts-img"><a href="listing-single.html"><img
                                                    src="{{asset('images/all/small/1.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="widget-posts-descr">
                                            <h4><a href="listing-single.html">Affordable Urban Room</a></h4>
                                            <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                        class="fas fa-map-marker-alt"></i> 40 Journal Square , NJ,
                                                    USA</a></div>
                                            <div class="widget-posts-descr-price"><span>Price: </span> $ 1500 / per
                                                month</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-posts-img"><a href="listing-single.html"><img
                                                    src="{{asset('images/all/small/1.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="widget-posts-descr">
                                            <h4><a href="listing-single.html">Family House</a></h4>
                                            <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                        class="fas fa-map-marker-alt"></i> 70 Bright St New York, USA
                                                </a></div>
                                            <div class="widget-posts-descr-price"><span>Price: </span> $ 50000</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-posts-img"><a href="listing-single.html"><img
                                                    src="{{asset('images/all/small/1.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="widget-posts-descr">
                                            <h4><a href="listing-single.html">Apartment to Rent</a></h4>
                                            <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                        class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a>
                                            </div>
                                            <div class="widget-posts-descr-price"><span>Price: </span> $100 / per night
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-posts-img"><a href="listing-single.html"><img
                                                    src="{{asset('images/all/small/1.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="widget-posts-descr">
                                            <h4><a href="listing-single.html">Apartment to Rent</a></h4>
                                            <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                        class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a>
                                            </div>
                                            <div class="widget-posts-descr-price"><span>Price: </span> $100 / per night
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- widget-posts end-->
                            <a href="/nha-ban" class="btn float-btn color-bg small-btn">Xem tiếp</a>
                        </div>
                    </div>
                    <!--box-widget end -->
                    <!--box-widget-->
                    {{-- <div class="box-widget fl-wrap hidden-section" style="margin-top: 30px">
                        <div class="box-widget-content fl-wrap color-bg">
                            <div class="color-form reset-action">
                                <div class="color-form-title fl-wrap">
                                    <h4>Calculate Your Mortgage</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis
                                        purus non cursus. </p>
                                </div>
                                <form method="post" name="mortgage-form">
                                    <div class="fl-wrap">
                                        <label for="amt">Loan Amount </label>
                                        <input id="amt" name="amt" type="text" placeholder="0" value="0">
                                        <div class="use-current-price tolt" data-microtip-position="left"
                                            data-tooltip="Use current price"><i class="fal fa-tag"></i></div>
                                    </div>
                                    <label for="apr">Percentage rate</label>
                                    <div class="price-rage-item fl-wrap">
                                        <input type="text" id="apr" name="apr" class="price-range" data-min="0"
                                            data-max="100" data-step="1" value="0" data-prefix="%">
                                    </div>
                                    <label for="trm">Loan Term (Years) </label>
                                    <div class="price-rage-item fl-wrap">
                                        <input type="text" id="trm" name="trm" class="price-range" data-min="0"
                                            data-max="5" data-step="1" value="0" data-prefix="Y">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button type="button" id="sbt" class="color2-bg">Calculate</button>
                                    <div class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Reset Form</div>
                                    <div class="monterage-title fl-wrap">
                                        <h5>Monthly payment:</h5>
                                        <input type="text" id="pmt" name="mPmt" value="0">
                                        <div class="monterage-title-item">$<span></span></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    <!--box-widget end -->
                    <!--box-widget-->
                    {{-- <div class="box-widget fl-wrap">
                        <div class="box-widget-title fl-wrap">Propertie Documents</div>
                        <div class="box-widget-content fl-wrap">
                            <div class="bwc_download-list">
                                <a href="#" download><span><i class="fal fa-file-pdf"></i></span>Property
                                    Presentation</a>
                                <a href="#" download><span><i class="fal fa-file-word"></i></span>Energetic
                                    Certificate</a>
                                <a href="#" download><span><i class="fal fa-file-pdf"></i></span>Property Plans</a>
                            </div>
                        </div>
                    </div> --}}
                    <!--box-widget end -->
                    <!--box-widget-->
                    <div class="box-widget fl-wrap">
                        <div class="box-widget-fixed-init fl-wrap" id="sec-contact">
                            <div class="box-widget-title fl-wrap box-widget-title-color color-bg">Để được tư vấn thêm</div>
                            <div class="box-widget-content fl-wrap">
                                <div class="custom-form">
                                    <form method="post" name="contact-property-form">
                                        <label>Tên* <span class="dec-icon"><i
                                                    class="fas fa-user"></i></span></label>
                                        <input name="phone" type="text" onClick="this.select()" value="">
                                        <label>Số điện thoại * <span class="dec-icon"><i
                                                    class="fas fa-phone"></i></span></label>
                                        <input name="phone" type="text" onClick="this.select()" value="">
                                        {{-- <div class="row">
                                            <div class="col-sm-6">
                                                <label>Date <span class="dec-icon"><i
                                                            class="fas fa-calendar-check"></i></span></label>
                                                <div class="date-container fl-wrap">
                                                    <input type="text" placeholder=""
                                                        style="padding: 16px 5px 16px 60px;" name="datepicker-here"
                                                        value="" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Time </label>
                                                <select data-placeholder="9 AM"
                                                    class="chosen-select on-radius no-search-select">
                                                    <option>9 AM</option>
                                                    <option>10 AM</option>
                                                    <option>11 AM</option>
                                                    <option>12 AM</option>
                                                    <option>13 PM</option>
                                                    <option>14 PM</option>
                                                    <option>15 PM</option>
                                                    <option>16 PM</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <button type="submit" class="btn float-btn color-bg fw-btn"> Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--box-widget end -->
                </div>
                <!--  sidebar end-->
            </div>
            <div class="fl-wrap limit-box"></div>
            <div class="listing-carousel-wrapper carousel-wrap fl-wrap">
                <div class="list-single-main-item-title">
                    <h3>Sản phẩm tương tự</h3>
                </div>
                <div class="listing-carousel carousel ">

                    {{-- @foreach($newestProducts as $newestProduct)
                    <!-- gallery-item-->
                    <div class="slick-slide-item">
                        <!-- listing-item -->
                        @include('frontends.components.product_card',['product'=>$newestProduct])
                        <!-- listing-item end-->
                    </div>
                    <!-- gallery-item end-->
                    @endforeach --}}

                    @foreach($newestProducts as $newestProduct)
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            @include('frontends.components.product_card',['product'=>$newestProduct])
                            {{-- <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="listing-single.html" class="geodir-category-img_item">
                                            <img src="{{asset('images/all/1.jpg')}}" alt="">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#4" class="map-item"><i class="fas fa-map-marker-alt"></i> 70 Bright St
                                                New York, USA</a>
                                        </div>
                                        <ul class="list-single-opt_header_cat">
                                            <li><a href="#" class="cat-opt blue-bg">Sale</a></li>
                                            <li><a href="#" class="cat-opt color-bg">Apartment</a></li>
                                        </ul>
                                        <a href="#" class="geodir_save-btn tolt" data-microtip-position="left"
                                            data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                        <a href="#" class="compare-btn tolt" data-microtip-position="left"
                                            data-tooltip="Compare"><span><i class="fal fa-random"></i></span></a>
                                        <div class="geodir-category-listing_media-list">
                                            <span><i class="fas fa-camera"></i> 8</span>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <h3><a href="listing-single.html">Gorgeous house for sale</a></h3>
                                        <div class="geodir-category-content_price">$ 600,000</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                            neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                                        <div class="geodir-category-content-details">
                                            <ul>
                                                <li><i class="fal fa-bed"></i><span>3</span></li>
                                                <li><i class="fal fa-bath"></i><span>2</span></li>
                                                <li><i class="fal fa-cube"></i><span>450 ft2</span></li>
                                            </ul>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a href="agent-single.html" class="gcf-company"><img src="{{asset('images/avatar/1.jpg')}}"
                                                    alt=""><span>By Liza Rose</span></a>
                                            <div class="listing-rating card-popup-rainingvis tolt"
                                                data-microtip-position="top" data-tooltip="Good" data-starrating2="4"></div>
                                        </div>
                                    </div>
                                </article>
                            </div> --}}
                            <!-- listing-item end-->
                        </div>
                        <!-- slick-slide-item end-->
                    @endforeach
                </div>
                {{-- <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
