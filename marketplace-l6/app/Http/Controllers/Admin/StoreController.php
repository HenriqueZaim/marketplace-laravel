<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Store;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    use UploadTrait;

    private $store;

    public function __construct(Store $store){
        $this->store = $store;
    }
    public function index(){
        return view('admin.stores.index', ['store' => auth()->user()->store]);
    }

    public function create(){
        return view('admin.stores.edit', ['users' => \App\User::all(['id', 'name'])]);
    }

    public function store(StoreRequest $request){
        $data = $request->all();
        $user = auth()->user();

        if ($request->hasFile('photos')) {
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }
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
        if ($request->hasFile('logo')) {
            if(Storage::disk('public')->exists($store->logo)){
                Storage::disk('public')->delete($store->logo);
            }

            $data['logo'] = $this->imageUpload($request->file('logo'));
        }

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
