<section class="hero-section hero-section_dec" data-scrollax-parent="true">
    <div class="bg-wrap">
        <div class="bg par-elem " data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <div class="hero-title hero-title_small">
            <h4>Mạng lưới thổ địa lớn nhất Đà Lạt</h4>
            <h2>Tìm bất động sản Đà Lạt của bạn
            </h2>
        </div>
        <div class="main-search-input-wrap">
            <div class="main-search-input fl-wrap">
                {{-- <div class="main-search-input-item">
                    <input type="text" placeholder="Đường, Phường, Xã" value="" />
                </div> --}}
                <div class="main-search-input-item">
                    <select data-placeholder="All Categories" class="chosen-select">
                        <option>Phường Xã</option>
                        @foreach ($locationsWards as $locationsWard)
                        <option> {{$locationsWard->full_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="main-search-input-item">
                    <select data-placeholder="All Categories" class="chosen-select">
                        <option>Đường</option>
                        @foreach ($locationsStreets as $locationsStreet)
                        <option> {{$locationsStreet->street_name;}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="main-search-input-item">
                    <select data-placeholder="All Categories" class="chosen-select no-search-select">
                        <option>Loại nhà đất</option>
                        @foreach ($categories as $categorie)
                        <option> {{$categorie->category;}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="main-search-button color-bg" onclick="window.location.href='{{ route('properties.index') }}'"> Tìm kiếm <i
                        class="far fa-search"></i> </button>
            </div>
        </div>
        <div class="hero-notifer fl-wrap">Lọc thêm? <a href="{{ route('properties.index') }}">Tìm kiếm nâng cao</a>
        </div>
        <div class="scroll-down-wrap">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
            <span>Cuộn xuống để khám phá thêm</span>
        </div>
    </div>
</section>