<div class="page-header" style="background: url({{asset('img/banner1.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">@yield('current-header')</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="ti-home"></i> Home</a></li>
                        <li class="current">@yield('current')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>