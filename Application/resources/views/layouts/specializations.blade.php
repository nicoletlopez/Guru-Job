<section class="category section">
    <br/><br/>
    <div class="container">
        <h2 class="section-title">Browse Specializations</h2>
        <div class="row">
            <div class="col-md-12">
                @foreach($allSpecs as $specialization)
                    <div style="word-wrap:break-word;" class="col-md-2 col-sm-3 col-xs-12 f-category">
                        <a href="{{route('search')}}?search-term=&region=&specialization={{$specialization->name}}&type=&free-day=&start-time=&end-time=">
                            <div class="icon">
                                <i class="ti-layout-grid2-alt"></i>
                            </div>
                            <h3>{{$specialization->name}}</h3>
                            <!--<p>jobs</p>-->
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <br/><br/>
</section>