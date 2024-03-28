<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\File;


class CreateAnnouncement extends Component
{
    use WithFileUploads;
    
    
    public $title;
    public $body;
    public $price;
    
    public $category;
    public $temporary_images;
    
    public $images = [];
    
    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category' => 'required',
        'price' => 'required|numeric',
        'images.*' => 'image|max:1024',
        'temporary_images.*'=> 'image|max:1024',
        
    ];
    protected $messages = [
        
        'required' => 'il campo :attribute è obbligatorio',
        'min' => 'il campo :attribute è troppo corto',
        'numeric' => 'il campo :attribute deve essere un numero',
        'temporary_images.required'=>'L\'immagine è richiesta',
        'temporary_images.*.image'=>'I file devono essere immagini',
        'temporary_images.*.max'=>'L\'immagine dev\'essere massimo di 1mb',
        'images.image'=>'L\'immagine dev\'essere un\'immagine',
        'images.max'=>'L\'immagine dev\'essere massimo di 1mb',
    ];

    public function updatedTemporaryImages()
    {
        if($this->validate(['temporary_images.*'=>'image|max:1024'])) {
            foreach ($this->temporary_images as $image) {
                $this->images[]= $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
    }
}


    public function store()
    {
        $this->validate();
        $announcement = Category::find($this->category)->announcements()->create($this->validate());
        if(count($this->images)) {
            foreach ($this->images as $image) {
                // $announcement->images()->create(['path'=> $image->store('images','public')]);
                $newFileName="announcements/{$announcement->id}";
                $newImage=$announcement->images()->create(['path'=> $image->store($newFileName,'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 500,500), //! qui crop automatico
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                    
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        
        // $category= Category::find($this->category);
        // $announcement= $category->announcements()->create([
        //     'title'=> $this->title,
        //     'body'=> $this->body,
        //     'price' => $this->price,
        // ]);
        
        
        // Auth::user()->announcements()->save($announcement);
        $announcement->user()->associate(Auth::user());
        $announcement->save();
        
        session()->flash('message','Annuncio caricato con successo, sarà pubblicato dopo la revisione ');
        $this->cleanForm();
        
        
        
    }
    
    public function updated($propertyName)
    {
        
        $this->validateOnly($propertyName);
    }
    
    public function cleanForm()
    {
        
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->images =[];
        $this->temporary_images =[];

        
        
    }
    public function render()
    {
        return view('livewire.create-announcement');
    }
}
