<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteersController\OrderRequest;
use App\Http\Services\VolunteerController\SortService;
use App\Models\User;
use App\Models\VolunteerOrder;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = User::where('is_admin', false)->where('is_block',false)->orderBy('lastname')->get()
            ->groupBy(function($item) {
            return mb_substr($item->lastname, 0, 1);
        });
        return view('volunteers', compact('volunteers'));
    }

    public function sort($field)
    {
        $volunteers = SortService::sort($field);
        return view('ajax.volunteers', compact('volunteers'))->render();
    }

    public function search($request)
    {
        $volunteers = User::where('is_admin', false)->withSearchFio($request)->orderBy('lastname')->get()
            ->groupBy(function($item) {
                return mb_substr($item->lastname, 0, 1);
            });
        return view('ajax.volunteers', compact('volunteers'))->render();
    }

    public function searchCity($city)
    {
        $volunteers = User::where('is_admin', false)->withSearchCity($city)->orderBy('lastname')->get()
            ->groupBy(function($item) {
                return mb_substr($item->lastname, 0, 1);
            });
        return view('ajax.volunteers', compact('volunteers'))->render();
    }

    public function order(OrderRequest $request)
    {
        return VolunteerOrder::create($request->validated());
    }
}
