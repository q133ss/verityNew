<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Contributor;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class CertificateController extends Controller
{
    public function show($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('certificate', compact('certificate'));
    }

    public function download($id)
    {
        Browsershot::url(env('APP_URL').'/certificate/'.$id)
        //Browsershot::url("https://music.yandex.ru/home")
            ->setOption('landscape', true)
            ->windowSize(1920, 1080)
            ->waitUntilNetworkIdle()
            ->save("storage/" . 'Certificate-'.$id.'.jpg');

        $file = public_path()."/storage/Certificate-$id.jpg";
        return response()->download($file);
    }
}
