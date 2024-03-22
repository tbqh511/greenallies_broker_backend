@extends('frontends.master')
@section('content')
<!-- content -->
<div class="content">
    <!--  section  -->
    {{-- <section class="hidden-section single-par2  " data-scrollax-parent="true">
        <div class="bg-wrap bg-parallax-wrap-gradien">
            <div class="bg par-elem " data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        </div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Listings Without Map</span></h2>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum
                    sem.</h4>
            </div>
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down To Discover</span>
            </div>
        </div>
    </section> --}}
    <!--  section  end-->
    <!-- breadcrumbs-->
    {{-- <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
        <div class="container">
            <div class="breadcrumbs-list">
                <a href="#">Home</a><a href="#">Listings</a> <span>New York</span>
            </div>
            <div class="share-holder hid-share">
                <a href="#" class="share-btn showshare sfcs"> <i class="fas fa-share-alt"></i> Share </a>
                <div class="share-container  isShare"></div>
            </div>
        </div>
    </div> --}}
    <!-- breadcrumbs end -->
    <!-- col-list-wrap -->
    <section class="gray-bg small-padding ">
        <div class="container">
            <div class="mob-nav-content-btn  color-bg show-list-wrap-search ntm fl-wrap">Tìm kiếm thêm</div>
            <!-- list-searh-input-wrap-->
            <div class="list-searh-input-wrap box_list-searh-input-wrap lws_mobile fl-wrap">
                <div class="list-searh-input-wrap-title fl-wrap"><i class="far fa-sliders-h"></i><span>Bộ Lọc Tìm
                        Kiếm</span></div>
                <div class="custom-form fl-wrap">
                    <form id="searchForm" action="{{ route('properties.index') }}" method="GET">
                        @csrf
                        <div class="row">
                            <!-- Ô nhập liệu tìm kiếm -->
                            <div class="col-sm-6">
                                <div class="listsearch-input-item">
                                    <input name="text" type="text" placeholder="Tìm BDS" value="" />
                                </div>
                            </div>
                            <!-- Kết thúc ô nhập liệu tìm kiếm -->
                            <!-- Ô lựa chọn trạng thái -->
                            <div class="col-sm-3">
                                <div class="listsearch-input-item">
                                    <select name="propery_type" data-placeholder="Tình trạng"
                                        class="chosen-select on-radius no-search-select">
                                        <option value="">Cho thuê & Bán</option>
                                        <option value="1">Cho Thuê</option>
                                        <option value="0">Bán</option>
                                    </select>
                                </div>
                                {{-- <div class="main-search-input-item">
                                    <select name="propery_type" data-placeholder="Cho thuê & Bán" class="chosen-select no-search-select">
                                        <option value="">Cho thuê & Bán</option>
                                        <option value="1">Cho Thuê</option>
                                        <option value="0">Bán</option>
                                    </select>
                                </div> --}}
                            </div>
                            <!-- Kết thúc ô lựa chọn trạng thái -->
                            <!-- Ô lựa chọn thành phố -->
                            <div class="col-sm-3">
                                <div class="listsearch-input-item">
                                    <select data-placeholder="Tất cả thành phố"
                                        class="chosen-select on-radius no-search-select">
                                        <option>Tất cả thành phố</option>
                                        <option>New York</option>
                                        <option>London</option>
                                        <option>Paris</option>
                                        <option>Kiev</option>
                                        <option>Moscow</option>
                                        <option>Dubai</option>
                                        <option>Rome</option>
                                        <option>Beijing</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Kết thúc ô lựa chọn thành phố -->
                            <div class="clearfix"></div>
                            <!-- Ô lựa chọn danh mục -->
                            <div class="col-sm-4">
                                <div class="listsearch-input-item">
                                    <select data-placeholder="Danh mục"
                                        class="chosen-select on-radius no-search-select">
                                        <option>Tất cả danh mục</option>
                                        <option>Nhà</option>
                                        <option>Căn hộ</option>
                                        <option>Khách sạn</option>
                                        <option>Biệt thự</option>
                                        <option>Văn phòng</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Kết thúc ô lựa chọn danh mục -->
                            <!-- Ô lựa chọn giá -->
                            <div class="col-sm-5">
                                <div class="listsearch-input-item">
                                    <div class="price-rage-item fl-wrap">
                                        <span class="pr_title">Giá:</span>
                                        <input type="text" class="price-range-double" data-min="100" data-max="100000"
                                            name="price-range2" data-step="100" value="1" data-prefix="$">
                                    </div>
                                </div>
                            </div>
                            <!-- Kết thúc ô lựa chọn giá -->
                            <!-- Nút tìm kiếm -->
                            <div class="col-sm-3">
                                <div class="listsearch-input-item">
                                    <button type="submit" class="btn color-bg fw-btn float-btn small-btn">Tìm kiếm</button>
                                </div>
                            </div>
                            <!-- Kết thúc nút tìm kiếm -->
                        </div>
                        <div class="clearfix"></div>
                        <div class="hidden-listing-filter fl-wrap">
                            <div class="row">
                                <!-- listsearch-input-item -->
                                <div class="col-sm-2">
                                    <div class="listsearch-input-item">
                                        <label>Số phòng ngủ</label>
                                        <select data-placeholder="Số phòng ngủ"
                                            class="chosen-select on-radius no-search-select">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- listsearch-input-item end-->
                                <!-- listsearch-input-item -->
                                <div class="col-sm-2">
                                    <div class="listsearch-input-item">
                                        <label>Số phòng tắm</label>
                                        <select data-placeholder="Số phòng tắm"
                                            class="chosen-select on-radius no-search-select">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- listsearch-input-item end-->
                                <!-- listsearch-input-item -->
                                <div class="col-sm-2">
                                    <div class="listsearch-input-item">
                                        <label>Số tầng</label>
                                        <select data-placeholder="Số tầng"
                                            class="chosen-select on-radius no-search-select">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- listsearch-input-item end-->
                                <!-- listsearch-input-item -->
                                <div class="col-sm-2">
                                    <div class="listsearch-input-item">
                                        <label>Mã bất động sản</label>
                                        <input type="text" onClick="this.select()" placeholder="Mã" value="" />
                                    </div>
                                </div>
                                <!-- listsearch-input-item end-->
                                <!-- listsearch-input-item -->
                                <div class="col-sm-4">
                                    <div class="listsearch-input-item">
                                        <label>Diện tích (ft<sup>2</sup>)</label>
                                        <div class="price-rage-item pr-nopad fl-wrap">
                                            <input type="text" class="price-range-double" data-min="1" data-max="1000"
                                                name="price-range2" data-step="1" value="1" data-prefix="">
                                        </div>
                                    </div>
                                </div>
                                <!-- listsearch-input-item -->
                            </div>
                            <div class="clearfix"></div>
                            <!-- listsearch-input-item-->
                            <div class="listsearch-input-item">
                                <label>Tiện ích</label>
                                <div class=" fl-wrap filter-tags">
                                    <ul class="no-list-style">
                                        <li>
                                            <input id="check-aa" type="checkbox" name="check">
                                            <label for="check-aa">Thang máy</label>
                                        </li>
                                        <li>
                                            <input id="check-b" type="checkbox" name="check">
                                            <label for="check-b">Phòng giặt</label>
                                        </li>
                                        <li>
                                            <input id="check-c" type="checkbox" name="check" checked>
                                            <label for="check-c">Bếp đầy đủ tiện nghi</label>
                                        </li>
                                        <li>
                                            <input id="check-d" type="checkbox" name="check">
                                            <label for="check-d">Điều hòa</label>
                                        </li>
                                        <li>
                                            <input id="check-d2" type="checkbox" name="check" checked>
                                            <label for="check-d2">Bãi đậu xe</label>
                                        </li>
                                        <li>
                                            <input id="check-d3" type="checkbox" name="check" checked>
                                            <label for="check-d3">Bể bơi</label>
                                        </li>
                                        <li>
                                            <input id="check-d4" type="checkbox" name="check">
                                            <label for="check-d4">Phòng gym</label>
                                        </li>
                                        <li>
                                            <input id="check-d5" type="checkbox" name="check">
                                            <label for="check-d5">An ninh</label>
                                        </li>
                                        <li>
                                            <input id="check-d6" type="checkbox" name="check">
                                            <label for="check-d6">Garage kết nối</label>
                                        </li>
                                        <li>
                                            <input id="check-d7" type="checkbox" name="check">
                                            <label for="check-d7">Sân sau</label>
                                        </li>
                                        <li>
                                            <input id="check-d8" type="checkbox" name="check">
                                            <label for="check-d8">Lò sưởi</label>
                                        </li>
                                        <li>
                                            <input id="check-d9" type="checkbox" name="check">
                                            <label for="check-d9">Bảo vệ cửa sổ</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- listsearch-input-item end-->
                        </div>
                    </form>
                </div>
                <div class="more-filter-option-wrap">
                    <div class="more-filter-option-btn more-filter-option act-hiddenpanel"> <span>Tìm kiếm nâng
                            cao</span> <i class="fas fa-caret-down"></i></div>
                    <div class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Đặt lại bộ lọc</div>
                </div>
            </div>
            <!-- list-searh-input-wrap end-->
            <!-- list-main-wrap-header-->
            <div class="list-main-wrap-header box-list-header fl-wrap">
                <!-- list-main-wrap-title-->
                <div class="list-main-wrap-title">
                    <h2>{{ $searchResult }}
                        <strong>{{ $properties->total() }}</strong>
                    </h2>
                </div>
                <!-- list-main-wrap-title end-->
                <!-- list-main-wrap-opt-->
                <div class="list-main-wrap-opt">
                    <!-- price-opt-->
                    <div class="price-opt">
                        <span class="price-opt-title">Sắp xếp theo:</span>
                        <div class="listsearch-input-item">
                            <select data-placeholder="Phổ biến" class="chosen-select no-search-select">
                                <option>Phổ biến</option>
                                <option>Điểm đánh giá trung bình</option>
                                <option>Giá: thấp đến cao</option>
                                <option>Giá: cao đến thấp</option>
                            </select>
                        </div>
                    </div>
                    <!-- price-opt end-->
                    <!-- price-opt-->
                    <div class="grid-opt">
                        <ul class="no-list-style">
                            <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt"
                                    data-microtip-position="bottom" data-tooltip="Xem dạng lưới"><i
                                        class="far fa-th"></i></span></li>
                            <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom"
                                    data-tooltip="Xem dạng danh sách"><i class="far fa-list"></i></span></li>
                        </ul>
                    </div>
                    <!-- price-opt end-->
                </div>
                <!-- list-main-wrap-opt end-->
            </div>
            <!-- list-main-wrap-header end-->
            <!-- listing-item-wrap-->
            <div class="listing-item-container three-columns-grid  box-list_ic fl-wrap">
                @foreach($properties as $productItem )
                <!-- listing-item -->
                @include('frontends.components.product_card',['productCard'=>$productItem ])
                <!-- listing-item end-->
                @endforeach
            </div>
            <!-- listing-item-wrap end-->
            <!-- pagination-->
            <div class="pagination">
                @if ($properties->onFirstPage())
                <a href="#" class="prevposts-link disabled"><i class="fa fa-caret-left"></i></a>
                @else
                <a href="{{ $properties->previousPageUrl() }}" class="prevposts-link"><i
                        class="fa fa-caret-left"></i></a>
                @endif

                @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $page => $url)
                @if ($page == $properties->currentPage())
                <a href="#" class="current-page">{{ $page }}</a>
                @else
                <a href="{{ $url }}">{{ $page }}</a>
                @endif
                @endforeach

                @if ($properties->hasMorePages())
                <a href="{{ $properties->nextPageUrl() }}" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                @else
                <a href="#" class="nextposts-link disabled"><i class="fa fa-caret-right"></i></a>
                @endif
            </div>
            <!-- pagination end-->
        </div>
    </section>
    <div class="limit-box fl-wrap"></div>
</div>
<!-- content end -->
@endsection