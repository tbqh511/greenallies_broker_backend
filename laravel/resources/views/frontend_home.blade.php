@extends('frontends.master')

@section('content')
<div class="content">
    <!--  section  -->
    @include('frontends.components.home_slider',['locationsStreets' => $locationsStreets, 'locationsWards' => $locationsWards, 'categories' => $categories])
    {{-- @include('frontends.components.home_slider',['locationsStreets' => $locationsStreets, 'locationsWards' => $locationsWards]) --}}
    <!--  section  end-->
    <!-- breadcrumbs-->
    @include('frontends.components.home_breadcrumb')
    <!-- breadcrumbs end -->
    <!-- section -->
    @include('frontends.components.home_products_grid', ['newestProducts'=> $newestProducts])
    @include('frontends.components.home_products_grid')
    <!-- section end-->
    <!-- section -->
    @include('frontends.components.home_about_wrap')
    <!-- section end-->
    <!-- section  -->
    @include('frontends.components.home_explore_place')
    <!--section end-->
    <!-- section -->
    @include('frontends.components.home_agent_list')
    <!-- section end-->
    <!-- section -->
    @include('frontends.components.home_report_info')
    <!-- section end-->
    <!-- section -->
    @include('frontends.components.home_client_say')
    <!-- section end-->
</div>
@endsection
