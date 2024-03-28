 <x-layout>
    <div class="container category-wrapper">
        <div class="container-fluid title-category mb-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-3 color-mywhite fw-light text-center">{{ __('ui.explorercategory') }}:{{__('ui.'.$category->name)}}</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid d-flrex justify-content-center">
            <div class="row py-4 w-100 h-100 align-items-center justify-content-around">
                
                
                @forelse ($category->announcements as $announcement)
                <div class="d-flex col-12 col-md-4 d-flex align-items-center justify-content-center">
                    {{-- INIZIO CARD --}}
                    <div id="myCard" class="card2 mx-3 my-3 color-mywhite">
                        <div class="container-img-card2">
                            <div class="overlay"></div>
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(500,500) : 'https://picsum.photos/200'}}" class="card-img2" alt="...">
                        </div>
                        <div class="card-body-2 text-center">
                            <!-- titolo -->
                            <h5 class="content-card title-cards m-0  title">{{ __('ui.title') }}:{{$announcement->title}}</h5>
                            <!-- descrizione -->
                            <p class="content-card truncate fw-light m-0 desc">{{ __('ui.description') }}:{{$announcement->body}}</p>
                            <!-- categoria -->
                            <p class="fw-light m-0  category-card cat">{{ __('ui.explorercategory') }}:{{__('ui.'.$announcement->category->name)}}</p>
                            <!-- prezzo -->
                            <p class="fw-light m-0 price">{{$announcement->price}} €</p>
                            <!-- button -->
                            <a href="{{route('announcements.show', compact('announcement'))}}" class="mybutton-card">{{ __('ui.view') }}</a>
                            <!-- data publiccazione -->
                            <p class="fst-italic fw-light m-0 date ">{{ __('ui.publishdate') }} 
                                {{$announcement->created_at->format('d/m/Y')}}
                            </p>
                        </div>
                    </div> 
                    {{-- FINE CARD --}}
                </div>
                @empty
                
                <div class="col-12 d-flex justify-content-center flex-column color-mywhite text-center fw-light">
                    <p class="fs-3">{{ __('ui.notannouncement') }}</p>
                    <p class="fs-4">{{ __('ui.publish') }}<a href="{{route('announcements.create')}}" class=""><button class="button-newannouncement">{{ __('ui.newannouncement') }}</button></a></p>
                </div>
                @endforelse
                
            </div>
            
        </div>
    </div>
</x-layout>
