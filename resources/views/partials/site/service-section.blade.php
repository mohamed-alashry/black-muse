<section class="bg-main py-5" id="services">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="text-white fw-lighter">
                    <h2 class="fw-lighter">Our <strong class="text-gold">Black Muse</strong> Services</h2>
                    <p class="fs-4">What we offer</p>
                </div>
                <!-- <a class="d-flex align-items-center text-secondary gap-1 btn">
                    <p>View All</p>
                    <i class="fa-solid fa-chevron-right"></i>
                </a> -->
            </div>
           
         <div class="services-carousel owl-carousel">  
             <!-- Services slider -->
	        @foreach(\App\Models\Service::where('status', 'active')->orderBy('id','desc')->get() as $service)
	                <div class="service-card">
	                    <img src="{{ asset('storage/'.$service->photo) }}" alt="imagecard">
	                    <div class="info-service px-1 py-3">
	                        <h5>{{$service->name}}</h5>
	                        <button   @if (auth('client')->check()) class="btn btn-service"  @else class="btn btn-service"   data-bs-toggle="modal" data-bs-target="#loginModal" @endif type="button">Choose a Package Now</button>
	                    </div>
	                </div>
	        @endforeach
	     </div>


        </div>
    </section>