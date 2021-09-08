<?php


namespace App\Http\Controllers;
use App\Models\Furniture;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function ShowProduct()
    {
        $product = furniture::all();
        return view('admin', compact('product'));
    }

    public function AddProduct(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'imgFullNameGallery' => 'required',
            ]
        );

        Furniture::create($request->all());
        return redirect()->route('admin')
            ->with('success','Chúc mừng bạn đã lưu thành công <3');

    }

    public function Admin()
    {
        return view('admin');
    }
}
