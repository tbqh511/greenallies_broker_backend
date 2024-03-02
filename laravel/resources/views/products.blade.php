@extends('frontends.master')
@section('content')
<div class="content">
    <!--  section  -->
    {{-- @include('frontends.components.parallax_header') --}}
    <!--  section  end-->
    <!-- breadcrumbs-->
    @include('frontends.components.home_breadcrumb')
    <!-- breadcrumbs end -->
    <!-- col-list-wrap -->
    <section class="gray-bg small-padding ">
        <div class="container">
            <div class="row">
                <!-- search sidebar-->
                <div class="col-md-4">
                    <div class="mob-nav-content-btn  color-bg show-list-wrap-search ntm fl-wrap">Tìm kiếm</div>
                    <div class="fl-wrap lws_mobile">
                        <div class="list-searh-input-wrap-title   fl-wrap"><i class="far fa-sliders-h"></i><span>Tìm kiếm</span></div>
                        <div class="block-box fl-wrap search-sb" id="filters-column">
                            <!-- listsearch-input-item-->
                            <div class="listsearch-input-item">
                                <label>Loại nhà đất</label>
                                <select data-placeholder="Status" class="chosen-select on-radius no-search-select">
                                    <option>Tất cả nhà đất</option>
                                    <option>Nhà bán</option>
                                    <option>Nhà riêng</option>
                                    <option>Nhà biệt thự</option>
                                    <option>Đất bán</option>
                                    <option>Căn hộ chung cư</option>
                                </select>
                            </div>
                            <!-- listsearch-input-item end-->
                            <!-- listsearch-input-item -->
                            <div class="listsearch-input-item">
                                <label>Tên đường</label>
                                <input type="text" onClick="this.select()" placeholder="Trần Hưng Đạo, Yersin ..."
                                    value="" />
                            </div>
                            <!-- listsearch-input-item end-->
                            <!-- listsearch-input-item -->
                            <div class="listsearch-input-item">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Phường xã</label>
                                        <select data-placeholder="Chọn Phường/xã"
                                            class="chosen-select on-radius no-search-select">
                                            <option>Phường 1</option>
                                            <option>Phường 2</option>
                                            <option>Phường 3</option>
                                            <option>Phường 4</option>
                                            <option>Phường 5</option>
                                            <option>Phường 6</option>
                                            <option>Phường 7</option>
                                            <option>Phường 8</option>
                                            <option>Phường 9</option>
                                            <option>Phường 10</option>
                                            <option>Phường 11</option>
                                            <option>Phường 12</option>
                                            <option>Xã Tà Nung</option>
                                            <option>Xã Xuân Trường</option>
                                            <option>Xã Xuân Thọ</option>
                                        </select>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <label>Categories</label>
                                        <select data-placeholder="Categories"
                                            class="chosen-select on-radius no-search-select">
                                            <option>All Categories</option>
                                            <option>House</option>
                                            <option>Apartment</option>
                                            <option>Hotel</option>
                                            <option>Villa</option>
                                            <option>Office</option>
                                        </select>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- listsearch-input-item end-->
                            <!-- listsearch-input-item -->
                            <div class="listsearch-input-item">
                                <div class="price-rage-item fl-wrap">
                                    <span class="pr_title">Mức giá:</span>
                                    <input type="text" class="price-range-double" data-min="100" data-max="100000"
                                        name="price-range2" data-step="100" value="1" data-prefix="$">
                                </div>
                            </div>
                            <!-- listsearch-input-item end-->
                            <!-- listsearch-input-item -->
                            <div class="listsearch-input-item">
                                <div class="price-rage-item fl-wrap">
                                    <span class="pr_title">Diện Tích:</span>
                                    <input type="text" class="price-range-double" data-min="1" data-max="1000"
                                        name="price-range2" data-step="1" value="1" data-prefix="">
                                </div>
                            </div>
                            <!-- listsearch-input-item end-->
                            {{-- <!-- listsearch-input-item -->
                            <div class="listsearch-input-item">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Bedrooms</label>
                                        <select data-placeholder="Bedrooms"
                                            class="chosen-select on-radius no-search-select">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Bathrooms</label>
                                        <select data-placeholder="Bathrooms"
                                            class="chosen-select on-radius no-search-select">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- listsearch-input-item end-->
                            <!-- listsearch-input-item -->
                            <div class="listsearch-input-item">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Floors</label>
                                        <select data-placeholder="Bathrooms"
                                            class="chosen-select on-radius no-search-select">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Property Id</label>
                                        <input type="text" onClick="this.select()" placeholder="Id" value="" />
                                    </div>
                                </div>
                            </div>
                            <!-- listsearch-input-item end-->
                            <!-- listsearch-input-item-->
                            <div class="listsearch-input-item">
                                <label>Amenities</label>
                                <div class=" fl-wrap filter-tags">
                                    <ul class="no-list-style">
                                        <li>
                                            <input id="check-aa" type="checkbox" name="check">
                                            <label for="check-aa">Elevator in building</label>
                                        </li>
                                        <li>
                                            <input id="check-b" type="checkbox" name="check">
                                            <label for="check-b"> Laundry Room</label>
                                        </li>
                                        <li>
                                            <input id="check-c" type="checkbox" name="check" checked>
                                            <label for="check-c">Equipped Kitchen</label>
                                        </li>
                                        <li>
                                            <input id="check-d" type="checkbox" name="check">
                                            <label for="check-d">Air Conditioned</label>
                                        </li>
                                        <li>
                                            <input id="check-d2" type="checkbox" name="check" checked>
                                            <label for="check-d2">Parking</label>
                                        </li>
                                        <li>
                                            <input id="check-d3" type="checkbox" name="check" checked>
                                            <label for="check-d3">Swimming Pool</label>
                                        </li>
                                        <li>
                                            <input id="check-d4" type="checkbox" name="check">
                                            <label for="check-d4">Fitness Gym</label>
                                        </li>
                                        <li>
                                            <input id="check-d5" type="checkbox" name="check">
                                            <label for="check-d5">Security</label>
                                        </li>
                                        <li>
                                            <input id="check-d6" type="checkbox" name="check">
                                            <label for="check-d6">Garage Attached</label>
                                        </li>
                                        <li>
                                            <input id="check-d7" type="checkbox" name="check">
                                            <label for="check-d7">Back yard</label>
                                        </li>
                                        <li>
                                            <input id="check-d8" type="checkbox" name="check">
                                            <label for="check-d8">Fireplace</label>
                                        </li>
                                        <li>
                                            <input id="check-d9" type="checkbox" name="check">
                                            <label for="check-d9">Window Covering</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- listsearch-input-item end--> --}}
                            <div class="msotw_footer">
                                <a href="#" class="btn small-btn float-btn color-bg">Tìm kiếm</a>
                                <div class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Làm mới</div>
                            </div>
                        </div>
                        <a class="back-tofilters color-bg custom-scroll-link fl-wrap scroll-to-fixed-fixed"
                            href="#filters-column">Quay lại bộ lọc <i class="fas fa-caret-up"></i></a>
                    </div>
                </div>
                <!-- search sidebar end-->

                <div class="col-md-8">
                    <!-- list-main-wrap-header-->
                    <div class="list-main-wrap-header box-list-header fl-wrap">
                        <!-- list-main-wrap-title-->
                        <div class="list-main-wrap-title">
                            <h2>Kết quả cho: <span>Phường 7 </span><strong>8</strong></h2>
                        </div>
                        <!-- list-main-wrap-title end-->
                        <!-- list-main-wrap-opt-->
                        <div class="list-main-wrap-opt">
                            <!-- price-opt-->
                            <div class="price-opt">
                                <span class="price-opt-title">Sắp xếp:</span>
                                <div class="listsearch-input-item">
                                    <select data-placeholder="Popularity" class="chosen-select no-search-select">
                                        <option>Phổ biến</option>
                                        <option>Giá: Thấp đến cao</option>
                                        <option>Giá: Cao đến thấp</option>
                                    </select>
                                </div>
                            </div>
                            <!-- price-opt end-->
                            <!-- price-opt-->
                            <div class="grid-opt">
                                <ul class="no-list-style">
                                    <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt"
                                            data-microtip-position="bottom" data-tooltip="Grid View"><i
                                                class="far fa-th"></i></span></li>
                                    <li class="grid-opt_act"><span class="one-col-grid tolt"
                                            data-microtip-position="bottom" data-tooltip="List View"><i
                                                class="far fa-list"></i></span></li>
                                </ul>
                            </div>
                            <!-- price-opt end-->
                        </div>
                        <!-- list-main-wrap-opt end-->
                    </div>
                    <!-- list-main-wrap-header end-->
                    <!-- listing-item-wrap-->
                    <div class="listing-item-container  box-list_ic fl-wrap">
                        @foreach (range(1,6) as $index)
                        <!-- listing-item -->
                        @include('frontends.components.product_card')
                        <!-- listing-item end-->
                        @endforeach
                    </div>
                    <!-- listing-item-wrap end-->
                    <!-- pagination-->
                    <div class="pagination">
                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                        <a href="#">1</a>
                        <a href="#" class="current-page">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                    </div>
                    <!-- pagination end-->
                </div>
                <!-- col-md 8 end -->
            </div>
        </div>
    </section>
    <div class="limit-box fl-wrap"></div>
</div>
@endsection
