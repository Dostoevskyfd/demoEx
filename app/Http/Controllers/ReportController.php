<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;
use App\Models\Categorie;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
class ReportController extends Controller
{
    public function index(){
        $works=Work::where('user_id', Auth::user()->id)->get();
       
        $scores=Score::all();
        $categories= Categorie::all();
        return view ('report.create', compact('works','scores','categories'));
    }

    /*public function create(){
        $categories= Categorie::all();
        return view ('report.create', compact('categories'));
    }*/

    public function store(Request $request):RedirectResponse{
        $request->validate([
            'title'=>['required', 'string', 'max:255'],
            'path_img'=>'image|mimes:jpg,bmp,png|max:800',
            'category_id'=>['required'],
        ]);
        $imageName=Storage::disk('public')->put('reports',$request->file('path_img'));
        Work::create([
            'title'=> $request->title,
            'path_img'=>$imageName,
            'score'=>null,
            'category_id'=> $request->category_id,
            'user_id'=>Auth::user()->id,
        ]);

        return redirect()->back();
    }
  
    public function update(Request $request, Work $work){
        $request->validate([
            'score' => ['required', 'integer', 'min:0', 'max:100'],
        ]);
        
        $work->update([
            'score'=>$request->score,
        ]);
        return redirect()->back();

    }
}
