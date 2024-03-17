@extends('frontends.master')
@section('content')
<!-- content -->	
<div class="content">
    <!--  section  -->
    <section class="hidden-section single-par2  " data-scrollax-parent="true">
        <div class="bg-wrap bg-parallax-wrap-gradien">
            <div class="bg par-elem "  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        </div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Listings Without Map</span></h2>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4>
            </div>
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down To Discover</span>
            </div>
        </div>
    </section>
    <!--  section  end-->
    <!-- breadcrumbs-->
    <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
        <div class="container">
            <div class="breadcrumbs-list">
                <a href="#">Home</a><a href="#">Listings</a> <span>New York</span>
            </div>
            <div class="share-holder hid-share">
                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                <div class="share-container  isShare"></div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs end -->
    <!-- col-list-wrap -->
    <section class="gray-bg small-padding ">
        <div class="container">
            <div class="mob-nav-content-btn  color-bg show-list-wrap-search ntm fl-wrap">Show  Filters</div>
            <!-- list-searh-input-wrap-->
            <div class="list-searh-input-wrap box_list-searh-input-wrap lws_mobile fl-wrap">
                <div class="list-searh-input-wrap-title fl-wrap"><i class="far fa-sliders-h"></i><span>Search Filters</span></div>
                <div class="custom-form fl-wrap">
                    <div class="row">
                        <!-- listsearch-input-item -->
                        <div class="col-sm-6">
                            <div class="listsearch-input-item  ">
                                <input type="text"   placeholder="Address , Street , State..." value=""/>
                            </div>
                        </div>
                        <!-- listsearch-input-item -->
                        <!-- listsearch-input-item -->
                        <div class="col-sm-3">
                            <div class="listsearch-input-item">
                                <select data-placeholder="Status" class="chosen-select on-radius no-search-select" >
                                    <option>Any Status</option>
                                    <option>For Rent</option>
                                    <option>For Sale</option>
                                </select>
                            </div>
                        </div>
                        <!-- listsearch-input-item -->								
                        <!-- listsearch-input-item -->
                        <div class="col-sm-3">
                            <div class="listsearch-input-item">
                                <select data-placeholder="All Cities" class="chosen-select on-radius no-search-select" >
                                    <option>All Cities</option>
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
                        <!-- listsearch-input-item -->
                        <div class="clearfix"></div>
                        <!-- listsearch-input-item -->
                        <div class="col-sm-4">
                            <div class="listsearch-input-item">
                                <select data-placeholder="Categories" class="chosen-select on-radius no-search-select" >
                                    <option>All Categories</option>
                                    <option>House</option>
                                    <option>Apartment</option>
                                    <option>Hotel</option>
                                    <option>Villa</option>
                                    <option>Office</option>
                                </select>
                            </div>
                        </div>
                        <!-- listsearch-input-item -->								
                        <!-- listsearch-input-item -->
                        <div class="col-sm-5">
                            <div class="listsearch-input-item">
                                <div class="price-rage-item fl-wrap">
                                    <span class="pr_title">Price:</span>                            
                                    <input type="text" class="price-range-double" data-min="100" data-max="100000"  name="price-range2"  data-step="100" value="1" data-prefix="$">
                                </div>
                            </div>
                        </div>
                        <!-- listsearch-input-item -->								
                        <!-- listsearch-input-item -->
                        <div class="col-sm-3">
                            <div class="listsearch-input-item">
                                <a href="#" class="btn color-bg fw-btn float-btn small-btn">Search</a>										
                            </div>
                        </div>
                        <!-- listsearch-input-item --> 						
                    </div>
                    <div class="clearfix"></div>
                    <div class="hidden-listing-filter fl-wrap">
                        <div class="row">
                            <!-- listsearch-input-item -->								
                            <div class="col-sm-2">
                                <div class="listsearch-input-item">
                                    <label>Bedrooms</label>
                                    <select data-placeholder="Bedrooms" class="chosen-select on-radius no-search-select" >
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
                                    <label>Bathrooms</label>
                                    <select data-placeholder="Bathrooms" class="chosen-select on-radius no-search-select" >
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
                                    <label>Floors</label>
                                    <select data-placeholder="Bathrooms" class="chosen-select on-radius no-search-select" >
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
                                    <label>Property Id</label>
                                    <input type="text" onClick="this.select()" placeholder="Id" value=""/>
                                </div>
                            </div>
                            <!-- listsearch-input-item end-->								
                            <!-- listsearch-input-item -->
                            <div class="col-sm-4">
                                <div class="listsearch-input-item">
                                    <label>Area Sq/ft</label>
                                    <div class="price-rage-item pr-nopad fl-wrap">
                                        <input type="text" class="price-range-double" data-min="1" data-max="1000"  name="price-range2"  data-step="1" value="1" data-prefix="">
                                    </div>
                                </div>
                            </div>
                            <!-- listsearch-input-item -->								
                        </div>
                        <div class="clearfix"></div>
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
                        <!-- listsearch-input-item end--> 												
                    </div>
                </div>
                <div class="more-filter-option-wrap">
                    <div class="more-filter-option-btn more-filter-option act-hiddenpanel"> <span>Advanced search</span> <i class="fas fa-caret-down"></i></div>
                    <div class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Reset Filters</div>
                </div>
            </div>
            <!-- list-searh-input-wrap end-->							
            <!-- list-main-wrap-header-->
            <div class="list-main-wrap-header box-list-header fl-wrap">
                <!-- list-main-wrap-title-->
                <div class="list-main-wrap-title">
                    <h2>Results For : <span>New York </span><strong>8</strong></h2>
                </div>
                <!-- list-main-wrap-title end-->
                <!-- list-main-wrap-opt-->
                <div class="list-main-wrap-opt">
                    <!-- price-opt-->
                    <div class="price-opt">
                        <span class="price-opt-title">Sort   by:</span>
                        <div class="listsearch-input-item">
                            <select data-placeholder="Popularity" class="chosen-select no-search-select" >
                                <option>Popularity</option>
                                <option>Average rating</option>
                                <option>Price: low to high</option>
                                <option>Price: high to low</option>
                            </select>
                        </div>
                    </div>
                    <!-- price-opt end-->
                    <!-- price-opt-->
                    <div class="grid-opt">
                        <ul class="no-list-style">
                            <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="far fa-th"></i></span></li>
                            <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="far fa-list"></i></span></li>
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
                    <a href="{{ $properties->previousPageUrl() }}" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
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