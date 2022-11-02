<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteersController\StoreRequest;
use App\Http\Requests\VolunteersController\UpdateRequest;
use App\Http\Services\VolunteerController\SortService;
use App\Models\User;
use App\Models\VolunteerOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VolunteersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers = User::where('is_admin', false)->where('is_block', false)->orderBy('created_at', 'DESC')->get();
        return view('admin.volunteers.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.volunteers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
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
        $data['socials'] = $socials;
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return to_route('admin.volunteers.index')->withSuccess('Волонтер успешно добавлен');
    }

    public function block()
    {
        //Показать заблокированных
        $volunteers = User::where('is_admin', false)->where('is_block', true)->orderBy('created_at', 'DESC')->get();
        return view('admin.volunteers.block', compact('volunteers'));
    }

    public function unblock($id)
    {
        $volunteer = User::find($id);
        $volunteer->is_block = false;
        $volunteer->save();
        return to_route('admin.volunteers.index')->withSuccess('Волонтер успешно разблокирван');
    }

    public function show($id)
    {
        $volunteer = User::find($id);
        return view('admin.volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $volunteer = User::findOrFail($id);
        return view('admin.volunteers.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
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
        User::findOrFail($id)->update($data);
        return to_route('admin.volunteers.index')->withSuccess('Волонтер успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usr = User::find($id);
        $usr->is_block = true;
        $usr->save();
        return to_route('admin.volunteers.index')->withSuccess('Волонтер успешно заблокирован');
    }

    public function orders()
    {
        $orders = VolunteerOrder::orderBy('created_at', 'DESC')->get();
        return view('admin.volunteers.orders', compact('orders'));
    }

    /*
     * Сортировка
     */

    public function sort($field)
    {
        $volunteers = SortService::adminSort($field);
        return view('ajax.admin.volunteers', compact('volunteers'))->render();
    }

    public function search($request)
    {
        $volunteers = User::where('is_admin', false)->withSearchFio($request)->orderBy('lastname')->get();
        return view('ajax.admin.volunteers', compact('volunteers'))->render();
    }

    public function searchCity($city)
    {
        $volunteers = User::where('is_admin', false)->withSearchCity($city)->orderBy('lastname')->get();
        return view('ajax.admin.volunteers', compact('volunteers'))->render();
    }
}
