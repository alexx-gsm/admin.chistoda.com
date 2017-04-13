<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    const PATH = '/admin/assets/prices/';


    public static function getActive()
    {
        return self::where('isActive', true)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function getInactive()
    {
        return self::where('isActive', false)
            ->where('isHidden', false)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function enable(int $id)
    {
        $price = self::find($id);

        if (!empty($price)) {
            $price->isActive = true;
            $price->save();
        }
    }

    public static function disable(int $id)
    {
        $price = self::find($id);

        if (!empty($price)) {
            $price->isActive = false;
            $price->save();
        }
    }

    public static function hide(int $id)
    {
        $price = self::find($id);

        if (!empty($price)) {
            $price->isActive = false;
            $price->isHidden = true;
            $price->save();
        }
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
