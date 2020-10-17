<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $store;

    public function __construct(Store $store){
        $this->store = $store;
    }
    public function index(){
        return view('admin.stores.index', ['stores' => \App\Store::paginate(10)]);
    }

    public function create(){
        return view('admin.stores.create', ['users' => \App\User::all(['id', 'name'])]);
    }

    public function store(Request $request){
        $data = $request->all();
        $user = \App\User::find($data['user']);
        $user->store()->create($data);

        return redirect()->route('admin.stores.index');

    }

    public function show(){

    }

    public function edit($store){
        $store = $this->store->find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $store){
        $data = $request->all();
        $store = $this->store->find($store);
        $store->update($data);

        flash('Loja atualizada')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store){
        $store = $this->store->find($store);
        $store->delete();

        return redirect()->route('admin.stores.index');
    }
}
