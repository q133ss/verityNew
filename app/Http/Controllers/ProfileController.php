<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        return view('profile.index', compact('user'));
    }

    public function contributors()
    {
        $contributors = Auth()->user()->getContributors;
        return view('profile.contributors', compact('contributors'));
    }

    public function certificate()
    {
        $countries = Country::get();
        return view('profile.certificate', compact('countries'));
    }

    public function statistic()
    {
        $user = Auth()->user();
        return view('profile.statistic', compact('user'));
    }
}
