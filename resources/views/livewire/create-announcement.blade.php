<div class="container announouncement-create-wrapper">
    @if (session()->has('message'))
    <div class="flex row center my-2 alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="row align-items-center">
        <div class="col-md-4">
            <h1 class="color-mywhite fw-light display-3">{{ __('ui.createtitle') }}</h1>
        </div>
        <div class="col-md-8 mt-5 col-form">
            <form wire:submit.prevent="store">
                @csrf
                {{-- CAMPO TITLE --}}
                <div class="mb-3">
                    <label for="title" class="form-label color-mywhite">{{ __('ui.titleannouncement') }}</label>
                    <input wire:model.live="title" type="text"
                    class="form-control text-white @error('title') is-invalid @enderror"
                    id="title">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- CAMPO BODY --}}
                <div class="mb-3">
                    <label for="body" class="form-label color-mywhite">{{ __('ui.descriptionannouncement') }}</label>
                    <textarea rows="5" cols="50" id="body"
                    class="form-control text-white @error('body') is-invalid @enderror" wire:model.live="body">
                    </textarea>
                    <div class="invalid-feedback">
                        @error('body')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            
            <div class="d-flex">
                <div class="mb-3">
                    <label for="price" class="form-label color-mywhite">{{ __('ui.priceannouncement') }}</label>
                    <input type="text" name="price"
                    class="form-control text-white @error('price') is-invalid @enderror" wire:model.live="price"
                    id="price">
                </div>
                
                <div class="mb-3 px-5">
                    <label class="color-mywhite mb-2" for="category">{{ __('ui.explorercategory') }}</label>
                    <select wire:model.defer="category" id="category" class="form-control text-white">
                        <option value="">{{ __('ui.choosecategory') }}</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{__('ui.'.$category->name)}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img" />
                @error('temporary_images.*')
                <p class="text-danger mt-2">{{$message}}</p>
                @enderror
            </div>
            @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>{{ __('ui.preview') }}:</p>
                    <div class="row border border-4 border-info rounded shadow py-4">
                        @foreach ($images as $key => $image)
                        <div class="col my-3">
                            {{--! ricordate bg-meme --}}
                            <div class="mx-auto color-mywhite shadow-rounded bg-meme" style="background-image: url({{$image->temporaryUrl()}});"></div>
                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{ __('ui.delete') }}</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            
            
            <button type="submit" class="button-newannouncement mx-0">{{ __('ui.buttoncreate') }}</button>
            
            
        </form>
    </div>
</div>
</div>
