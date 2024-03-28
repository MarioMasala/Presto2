<x-layout>
  
  <div class="container-fluid">
    <div class="title-view-ann">
        <h2 class="text-uppercase text-center text-white">{{ __('ui.announc') }}:{{ $announcement->title }}</h2>
   </div>
    <div class="row justify-content-center ">
     
        <div id="carouselExampleIndicators" class="carousel slide ca-my">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
            class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
          </div>
          @if ($announcement->images)
          <div class="carousel-inner">
            @foreach ($announcement->images as $image)
            <div class="carousel-item @if($loop->first)active @endif">
              <img src="{{$image->getUrl(500,500)}}" class="img-fluid p-5 rounded" alt="...">
            </div>
            @endforeach
          </div>
          @else
          <div class="carousel-inner">
            <div class="carousel-item">
              <img src="https://picsum.photos/id/1200/400" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://picsum.photos/id/1200/400" alt="...">
            </div>
          </div>
          @endif
          <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon " aria-hidden="true"></span>
          <span class="visually-hidden ">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    
      
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-center w-100 text-white ">
  <div class="content-desc-ann col-12 p-0 col-md-6 d-flex justify-content-center align-items-center flex-column">
   
    <h5 class="card-title ">{{ __('ui.title') }}:{{ $announcement->title }}</h5>
    <p class="card-text ">{{ $announcement->description }}</p>
    <p class="card-text ">{{ $announcement->price }} €</p>
    <a href="{{ route('categoryShow', ['category'=>$announcement->category]) }}" class="btn btn-cat my-2">{{ __('ui.explorercategory') }}:{{__('ui.'.$announcement->category->name)}}</a>
    <p class="fst-italic ">{{ __('ui.publishdate2') }}:{{ $announcement->created_at->format('d/m/Y') }}</p>
  </div>
</div>
</div>

</x-layout>
