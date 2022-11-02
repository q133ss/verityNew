<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\VolunteerController\SortService;
use App\Models\Contributor;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $contributors = Contributor::get();
        return view('admin.index', compact('contributors'));
    }

    public function sort($field)
    {
        switch ($field){
            case 'sum-high':
                $contributors = Contributor::orderBy('sum','DESC')->get();
                break;
            case 'sum-low':
                $contributors = Contributor::orderBy('sum','ASC')->get();
                break;
            case 'new':
                $contributors = Contributor::orderBy('created_at','ASC')->get();
                break;
            default:
                $contributors = Contributor::orderBy('created_at','DESC')->get();
                break;
        }

        return view('ajax.admin.index', compact('contributors'))->render();
    }

    public function search($request)
    {
        $contributors = Contributor::withSearchFio($request)->orderBy('lastname')->get();
        return view('ajax.admin.index', compact('contributors'))->render();
    }

    public function searchCity($city)
    {
        $contributors = Contributor::withSearchCity($city)->orderBy('lastname')->get();
        return view('ajax.admin.index', compact('contributors'))->render();
    }
}
