<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request){

        $image = $request->get('image');

        if(Storage::disk('public')->exists($image)){
            Storage::disk('public')->delete($image);
        }

        $photo = ProductPhoto::where('image', $image);
        $product = $photo->first()->product_id;
        $photo->delete();

        flash('Imagem excluída com sucesso')->success();

        return redirect()->route('admin.products.edit', ['product' => $product]);
    }
}
