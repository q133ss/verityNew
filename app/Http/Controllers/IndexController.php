<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        if(Request()->ref != null){
            session()->put('ref', Request()->ref);
            session()->save();
            User::findOrFail(Request()->ref)->addStat('transitions');
        }
        return view('index');
    }
}
