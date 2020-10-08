<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        return view('admin.stores.index', ['stores' => \App\Store::paginate(10)]);
    }

    public function new(){
        return view('admin.stores.newStore', ['users' => \App\User::all(['id', 'name'])]);
    }

    public function save(Request $request){
        $data = $request->all();
        $user = \App\User::find($data['user']);

        return $user->store()->create($data);
    }

    public function edit($store){
        $store = \App\Store::find($store);

        return view('admin.stores.editStore', compact('store'));
    }

    public function update(Request $request, $store){
        $data = $request->all();
        $store = \App\Store::find($store);
        $store->update($data);

        flash('Loja atualizada')->success();
        return redirect()->route('admin.stores.index');
    }

    public function delete($store){
        $store = \App\Store::find($store);
        $store->delete();

        return redirect('/admin/stores');
    }
}
