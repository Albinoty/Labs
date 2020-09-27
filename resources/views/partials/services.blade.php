<!-- Services section -->
<div class="services-section spad">
    <div class="container" id="service">
        <div class="section-title dark">
            <h2>Get in <span>the Lab</span> and see the services</h2>
        </div>
        <div class="row">
            <!-- single service -->
            @foreach ($services as $service)
                <div class="col-md-4 col-sm-6">
                    <div class="service">
                        <div class="icon">
                            <i class="{{$service->logo}}"></i>
                        </div>
                        <div class="service-text">
                            <h2>{{$service->titre}}</h2>
                            <p>{{$service->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{$services->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>
        <div class="text-center">
            <a href="#top" class="site-btn">{{isset($bouton) != null ? $bouton->texte : 'browse'}}</a>
        </div>
    </div>
</div>
<!-- services section end -->
