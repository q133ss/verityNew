<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserController\UpdateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(UpdateRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('photo')) {
            $path = $request->file('photo')->store('volunteers', 'public');
            $data['photo'] = '/storage/' . $path;
        }
        $socials = json_encode([
            'whatsapp' => $request->whatsapp,
            'telegram' => $request->telegram,
            'email' => $request->email
        ]);
        unset($data['whatsapp']);
        unset($data['telegram']);
        unset($data['email']);
        $data['socials'] = $socials;
        Auth()->user()->update($data);
        return to_route('profile.index')->withSuccess('Профиль успешно изменен');
    }
}
