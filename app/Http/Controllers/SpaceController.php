<?php

namespace App\Http\Controllers;
use App\Models\Typespace;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function index(){
        return view('admin.spaces.list.index');
    }
}
