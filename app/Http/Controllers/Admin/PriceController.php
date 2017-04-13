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
        return view('admin.price', [
            'activePrices' => Price::getActive(),
            'inActivePrices' => Price::getInactive()
        ]);
    }

    public function enable(Request $request)
    {
        $id = $request->input('id') ?? null;
        if (null !== $id) {
            Price::enable($id);
        }
        return redirect()->to('/admin/price');
    }

    public function disable(Request $request)
    {
        $id = $request->input('id') ?? null;
        if (null !== $id) {
            Price::disable($id);
        }
        return redirect()->to('/admin/price');
    }

    public function hide(Request $request)
    {
        $id = $request->input('id') ?? null;
        if (null !== $id) {
            Price::hide($id);
        }
        return redirect()->to('/admin/price');
    }

    public function save(Request $request)
    {
        $id = $request->input('price_id') ?? null;
        $price = (null !== $id) ? Price::find($id) : new Price();

        if( empty($price) ) {
            return \Redirect::to('/admin/price');
        }

        $price->title = $request->input('title') ?? 'Прайс';
        $price->user_id = Auth::id();

        if ($request->hasFile('price') && $request->file('price')->isValid()) {
            $file = $request->file('price');

            $directory = __DIR__ . '/../../../..' . config('app.upload');
            $fileName = 'ChistoDA_price_' . date('Y-m-d_H:i:s') . '.' . $file->extension();

            try {
                $file->move($directory, $fileName);
                $price->name = $fileName;
                $price->link = $price::PATH . $fileName;
            } catch (FileException $err) {
                echo $err->getMessage(); die;
            }
        }

        $price->save();

        return \Redirect::to('/admin/price');
    }
}
