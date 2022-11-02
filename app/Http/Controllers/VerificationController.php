<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerificationController\CheckRequest;
use App\Models\Certificate;
use App\Models\Contributor;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function check(CheckRequest $request)
    {
        if($request->has('number')){
            $certificate = Certificate::where('number', $request->number)->first();
        }elseif($request->has('phone')){
            $contributor = Contributor::where('phone', $request->phone);
            if($contributor->exists()){
                $certificate = $contributor->first()->Certificate;
            }
        }elseif ($request->has('lastname') && $request->has('name') && $request->has('patronymic')){
            $contributor = Contributor::where('lastname', $request->lastname)->where('name', $request->name)->where('patronymic', $request->patronymic);
            if($contributor->exists()){
                $certificate = $contributor->first()->Certificate;
            }
        }

        if(isset($certificate)){
            return view('ajax.verification.success', compact('certificate'))->render();
        }else{
            return view('ajax.verification.error')->render();
        }
    }
}
