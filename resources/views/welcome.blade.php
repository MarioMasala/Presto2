{{-- <x-layout>
    <h1 class="bg-info">Presto.it</h1>
    <p>Ecco i nostri annunci</p>
    <div class="container">
        <div class="div row">
            @foreach ($announcements as $announcement)
            <div class="div col-12 col-md-4 my-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <p class="card-text">{{$announcement->body}}</p>
                        <p class="card-text">{{$announcement->price}}</p>
                        <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-primary">Visualizza</a>
                        <a href="" class="btn btn-primary">Categoria: {{$announcement->category->name}}</a>
                        <p>Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout> --}}

<x-layout>
    
    
    <header class="bg-2 w-100 ">
        <div class="content-title ">
            <p><span class="primary-font-title first-text-title hidden-top ">Presto</span> <span class="second-font-title second-text-title hidden-r">Buy now!</span> </p>
            
        </div>
        
    </header>
    
    <main >
        
        <section class=" w-100">
            <div class="content-sec-two w-100  ">
                <p class="title-section-announcemnt-home third-font-text hidden-l overflow-x-hidden">{{ __('ui.allAnnouncements') }}<button class="btn-home"><i class="bi bi-arrow-down-circle"></i></button></p>
                
            </div>
            
            
            
        </section >
        <section class=" w-100 container container-card">
            <div class="row w-100 card-row justify-content-around ">
                
                @foreach ($announcements as $announcement)
                <div class="d-flex col-12  col-md-6  p-0 justify-content-center align-items-center ">
                    {{-- INIZIO CARD --}}
                    <div id="myCard" class="card2 mx-5 mb-5 my-5 color-mywhite hidden-top ">
                        <div class="container-img-card2 ">
                            <div class="overlay"></div>
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(500,500) : 'https://picsum.photos/200'}}" class="card-img2" alt="...">
                        </div>
                        <div class="card-body-2 text-center">
                            <!-- titolo -->
                            <h5 class="content-card  m-0  title">{{ __('ui.title') }}:{{$announcement->title}}</h5>
                            <!-- descrizione -->
                            <p class="content-card truncate fw-light m-0  desc">{{ __('ui.description') }}:{{$announcement->body}}</p>
                            <!-- categoria -->
                            <p class="fw-light m-0  category-card cat">{{ __('ui.explorercategory') }}:{{__('ui.'.$announcement->category->name)}}</p>
                            <!-- prezzo -->
                            <p class="fw-light m-0  price">{{$announcement->price}} €</p>
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
                @endforeach
            </div></section>
            
        </main>
        
        
        <!-- INIZIO CONTAINER CARD -->
        {{-- Benvenuti con traduzione --}}
        {{-- <div class="col-md-4">
            <h1 class="color-mywhite fw-light">{{ __('ui.welcome') }}</h1>
        </div>
        <section class="container container-card w-100 my-5">
            <div class="row card-row">
                {{-- Div con cambio lingua --}}
                {{--}}  <div class="col-12 col-md-6 text-center">
                    <h5 class="py-5 text-uppercase font-primary">{{ __('ui.allAnnouncements') }}</h5>
                </div>
                {{-- fine div cambio lingua --}}
                {{--   @foreach ($announcements as $announcement)
                    <div class="d-flex col-12 col-md-6 col-lg-3">
                        {{-- INIZIO CARD --}}
                        {{--}}   <div id="myCard" class="card2 mx-3 mb-3 color-mywhite">
                            <div class="container-img-card2">
                                <div class="overlay"></div>
                                <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path): 'https://picsum.photos/200'}} " class="card-img2" alt="...">
                            </div>
                            <div class="card-body-2 text-center">
                                <!-- titolo -->
                                <h5 class="content-card title-cards m-0 pb-3">{{$announcement->title}}</h5>
                                <!-- descrizione -->
                                <p class="content-card truncate fw-light m-0 pb-3">{{$announcement->body}}</p>
                                <!-- categoria -->
                                <p class="fw-light m-0 pb-3 category-card">{{ __('ui.explorercategory') }}:{{__('ui.'.$announcement->category->name)}}</p>
                                <!-- prezzo -->
                                <p class="fw-light m-0 pb-3">{{$announcement->price}} €</p>
                                <!-- button -->
                                <a href="{{route('announcements.show', compact('announcement'))}}" class="mybutton-card">{{ __('ui.view') }}</a>
                                <!-- data publiccazione -->
                                <p class="fst-italic fw-light m-0 pt-5">{{ __('ui.publishdate') }} 
                                    {{$announcement->created_at->format('d/m/Y')}}
                                    
                                </p>
                            </div>
                        </div> 
                        {{-- FINE CARD --}}
                        {{--}}  </div>
                        @endforeach
                    </div>
                </section>
                {{-- FINE CONTAINER CARD --}}
            </x-layout>
            
            
            
            
            
            