<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\User;
use App\Models\Score;
class AdminController extends Controller
{
    public function index(){
        $works=Work::all();
        $scores=Score::all();
        
        return view('admin.index', compact('works', 'scores'));
    }
}
