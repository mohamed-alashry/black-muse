<section class="bg-main py-3 porto-section" style="background-image: url(./images/portohero.png);">
  <div class="row h-100">
    <div class="col-md-4 my-auto">
      <div class="porto-summry text-white d-flex flex-column gap-2 z-3 mb-2 mx-md-5 mx-2">
        <p class="fw-lighter">protofolio Category</p>
        <h1 class="text-gold lh-1">Black Muse</h1>
        <h1 class="fw-bolder lh-1">Portfolio classic</h1>
        <p class="fw-lighter">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
     
      @if (Route::currentRouteName() !== 'site.portfolio')   
        <a href="{{ route('site.portfolio') }}" type="button" class="btn btn-outline-light rounded-4 p-2 align-self-baseline fw-lighter">
          <i class="fa-solid fa-right-to-bracket"></i>
          See our Portofolio
        </a>
      @endif

      </div>
    </div>
    <div class="col-md-8 mt-auto ps-md-5">
      <div class="portfolio-carousel owl-carousel z-3">
      
        <!-- Portfolios -->
        @foreach(\App\Models\Portfolio::where('status', 'active')->orderBy('id')->get() as $portfolio)
           <div class="porto-card ">
            <a href="{{ route('site.portfolio.show', $portfolio->id) }}">
               <img class="porto-img" src="{{ asset('storage/'.$portfolio->photo) }}" alt="imagecard">
               <p class="porto-title w-75 text-wrap">{{$portfolio->title}}</p>
            </a>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</section>
