<?php

namespace App\Http\Controllers\Admin;

use App\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PriceController extends Controller
{
    public function index()
    {
        return view('admin.price', ['prices' => Price::orderby('id', 'desc')->get()]);
    }

    public function save(Request $request)
    {
        if ($request->hasFile('price') && $request->file('price')->isValid()) {
            $file = $request->file('price');

            $directory = __DIR__ . '/../../../..' . config('app.upload');
            $fileName = 'ChistoDA_price_' . date('Y_m_d') . '.' . $file->extension();
            $title = $request->input('title') ?? 'Прайс';

            try {
                $file->move($directory, $fileName);

                $price = new Price();
                $price->title = $title;
                $price->name = $fileName;
                $price->link = $price::PATH . $fileName;
                $price->user_id = Auth::id();
                $price->save();

            } catch (FileException $err) {
                echo $err->getMessage();
            }
        } else {
            echo 'upload file ERROR!';
        }


         return \Redirect::to('/admin/price');
    }
}
