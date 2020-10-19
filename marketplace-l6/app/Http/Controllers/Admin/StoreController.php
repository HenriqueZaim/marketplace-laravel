<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $store;

    public function __construct(Store $store){
        $this->middleware('user.has.store')->only(['create', 'store']);
        $this->store = $store;
    }
    public function index(){
        return view('admin.stores.index', ['store' => auth()->user()->store]);
    }

    public function create(){
        return view('admin.stores.create', ['users' => \App\User::all(['id', 'name'])]);
    }

    public function store(StoreRequest $request){
        $data = $request->all();
        $user = auth()->user();
        $user->store()->create($data);

        flash('Loja cadastrada com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }

    public function show(){

    }

    public function edit($store){
        $store = $this->store->find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store){
        $data = $request->all();
        $store = $this->store->find($store);
        $store->update($data);

        flash('Loja atualizada com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store){
        $store = $this->store->findOrFail($store);
        $store->delete();

        flash('Loja deletada com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }
}
