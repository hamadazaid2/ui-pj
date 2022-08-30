<?php

namespace App\Traits;

trait OfferTrait
{

    public function savePhoto($request, $path)
    {
        $file_extenstion  = $request->getClientOriginalExtension();
        $file_name  = time() . '.' . $file_extenstion;
        $path = 'photos/offers';
        $name_on_db=$path.'/'.$file_name;
        $request->move($path, $name_on_db);
        return $name_on_db;
    }
}
