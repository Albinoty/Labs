<!-- Sidebar area -->
<div class="col-md-4 col-sm-5 sidebar">
    <!-- Single widget -->
    <div class="widget-item">
        <form action="{{url('/search')}}" class="search-form" method="GET">
            @csrf
            @method('get')
            <input type="text" placeholder="Search" name="search">
            <button class="search-btn h-100"><i class="flaticon-026-search"></i></button>
        </form>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">Categories</h2>
        <ul>
            @foreach ($categories as $categorie)
                <li><a href="{{url('/search',$categorie->nom)}}">{{$categorie->nom}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">Instagram</h2>
        <ul class="instagram">
            <li><img src="/img/instagram/1.jpg" alt=""></li>
            <li><img src="/img/instagram/2.jpg" alt=""></li>
            <li><img src="/img/instagram/3.jpg" alt=""></li>
            <li><img src="/img/instagram/4.jpg" alt=""></li>
            <li><img src="/img/instagram/5.jpg" alt=""></li>
            <li><img src="/img/instagram/6.jpg" alt=""></li>
        </ul>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">Tags</h2>
        <ul class="tag">
            @foreach ($tags as $tag)
                <li><a href="{{url('/search/tag',$tag->id)}}">{{$tag->nom}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">Quote</h2>
        <div class="quote">
            <span class="quotation">‘​‌‘​‌</span>
            <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus.
                Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. Sed lacinia turpis at ultricies
                vestibulum.</p>
        </div>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
        <h2 class="widget-title">Add</h2>
        <div class="add">
            <a href=""><img src="/img/add.jpg" alt=""></a>
        </div>
    </div>
</div>
