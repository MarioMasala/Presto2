<x-layout>
    <div class="container-fluid d-flex justify-content-center align-items-center p-5 vh-100 mb-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-light p-5">
                <h1 class="display-2 text-center">
                    {{$announcement_to_check ? 'Ecco l\'annuncio da reviosionare' : 'Non ci sono annunci da revisionare'}}
                </h1>
            </div>
        </div>
    </div>
    @if($announcement_to_check)
    <div class="container">
        <div class="row w-100 flex-column justify-content-start align-items-start">
            <div class="col-6 d-flex justify-content-center align items-center">
                <div id="showCarousel" class="carousel carousel-rev slide color-mywhite" data-bs-ride="carousel">
                    @if ($announcement_to_check->images->isNotEmpty())
                    <div class="carousel-inner d-flex flex-column carousel-inner-rev color-mywhite">
                        @foreach ($announcement_to_check->images as $image)
                        <div class="carousel-item @if($loop->first)active @endif">
                            <img src="{{$image->getUrl(500,500)}}" class="img-fluid p-3 rounded" alt="Immagine non presente">
                        </div>
                        {{-- Google Ads --}}
                        <div class="col-mb-3 w-100 position-relative d-flex justify-content-center container-ads">
                            <div class="p-2">
                                <h5 class="tc-accent mt-3 fs-2 text-center mb-3">Tags</h5>
                                @if($image->labels)
                                @foreach($image->labels as $label)
                                <p class="d-inline">{{ $label }} ,</p>
                                @endforeach
                                @endif
                                <div class="row text-center justify-content-center align-items-center">
                                    <h5 class="tc_accent">{{ __('ui.imagerevision') }}</h5>
                                </div>
                                <div class="row w-100 justify-content-center align-items-center">
                                    <div class="card-body color-mywhite w-100 d-flex justify-content-center align-items-center">
                                        <div class="col-6 d-flex flex-column justify-content-center align-items-center w-100">
                                            <p>{{ __('ui.adult') }}:<span class="{{ $image->adult }}"></span></p>
                                            <p>{{ __('ui.spoof') }}:<span class="{{ $image->spoof }}"></span></p>
                                            <p>{{ __('ui.medical') }}:<span class="{{ $image->medical }}"></span></p>
                                        </div>
                                        <div class="col-6 w-100 d-flex justify-content-center align-items-center flex-column">
                                            <p>{{ __('ui.violence') }}:<span class="{{ $image->violence }}"></span></p>
                                            <p>{{ __('ui.racy') }}:<span class="{{ $image->racy }}"></span></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="carousel-inner color-mywhite">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/1200/400" alt="no img">
                            
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1200/400" alt="no img">
                        </div>
                    </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" area-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" area-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-6 color-mywhite d-flex justify-content-center align-items-center flex-column">
                <h5 class="card-title mb-3">{{ __('ui.title') }}:{{$announcement_to_check->title}}</h5>
                <p class="card-text">{{ __('ui.description') }}:{{$announcement_to_check->body}}</p>
                <p class="card-footer">{{ __('ui.publishdate2') }}:  {{($announcement_to_check->created_at->format('d/m/Y'))}} </p>
            </div>
            <div class="row w-50 mb-5 justify-content-around">
                <div class="col-md-2 d-flex justify-content-center">
                    <form action="{{route('revisor.accept_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success shadow">{{ __('ui.accept') }}</button>
                    </form>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                    <form action="{{route('revisor.reject_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger shadow">{{ __('ui.reject') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-layout>