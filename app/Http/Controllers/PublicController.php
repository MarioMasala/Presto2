<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){
        
        $announcements = Announcement::where('is_accepted', true)->orderby('created_at','desc')->take(6)->get();
        return view('welcome', compact('announcements'));
    }
    
    public function categoryShow(Category $category){
        
        return view('categoryShow', compact('category'));
    }
    
    public function lavoraConNoi(){
        return view('lavora-con-noi');
    }
    
    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact('announcements'));
    }
    
    /* funzione per il cambio lingua */
    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
    
}
