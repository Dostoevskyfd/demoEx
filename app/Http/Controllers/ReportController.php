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
        return view ('report.index', compact('works','scores'));
    }

    public function create(){
        $categories= Categorie::all();
        return view ('report.create', compact('categories'));
    }

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
            'category_id'=> $request->category_id,
            'scores_id'=>1,
            'user_id'=>Auth::user()->id,
        ]);

        return redirect()->route('dashboard');
    }
    public function showForm()
    {
        $submission = Submission::where('user_id', Auth::id())->first();

        if ($submission) {
            
            return view('report.create', ['submission' => $submission]);
        }

        
        return view('report.create');
    }

    public function update(Request $request){
        $request->validate([
            'scores_id'=>['required'],
            'id'=>['required']
        ]);
        Work::where('id',$request->id)->update([
            'scores_id'=>$request->scores_id,
        ]);
        return redirect()->back();

    }
}
