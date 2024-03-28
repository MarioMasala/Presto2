<x-layout>
  
    <div class="bg-all h-100 w-100 p-lg-5">
    <div class="container-fluid h-100 p-lg-5  ">
        <div class=" row h-100 align-items-center w-100 ">
            @forelse ($announcements as $announcement)
            <div class="d-flex col-12 col-lg-6 align-items-center justify-content-center p-0">
                {{-- INIZIO CARD --}}
                <div id="myCard" class="card2 mx-5 my-5 color-mywhite ">
                    <div class="container-img-card2">
                        <div class="overlay"></div>
                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(500,500) : 'https://picsum.photos/200'}}" class="card-img2" alt="...">
                    </div>
                    <div class="card-body-2 text-center">
                        <!-- titolo -->
                        <h5 class="content-card title-cards m-0 title">{{$announcement->title}}</h5>
                        <!-- descrizione -->
                        <p class="content-card truncate fw-light  desc">{{$announcement->body}}</p>
                        <!-- categoria -->
                        <p class="fw-light category-card cat m-0">{{ __('ui.explorercategory') }}:{{__('ui.'.$announcement->category->name)}}</p>
                        <!-- prezzo -->
                        <p class="fw-light  price">{{$announcement->price}} €</p>
                        <!-- button -->
                        <a href="{{route('announcements.show', compact('announcement'))}}" class="mybutton-card">{{ __('ui.view') }}</a>
                        <!-- data publiccazione -->
                        <p class="fst-italic fw-light m-0 date">{{ __('ui.publishdate') }} 
                            {{$announcement->created_at->format('d/m/Y')}}
                        </p>
                    </div>
                </div> 
                {{-- FINE CARD --}}
            </div>
            @empty 
            <div class="col-12">
                <div class="alert alert-warning py-3 shadow">
                    <p class="lead">{{ __('ui.notannouncement') }}</p>
                </div>
            </div>
            @endforelse
            {{$announcements->links()}}
        </div>
    </div>
    </div>
    
</x-layout>