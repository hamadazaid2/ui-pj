<?php

namespace App\Traits;

trait OfferTrait
{

    public function savePhoto($request, $path)
    {
        $file_extenstion  = $request->getClientOriginalExtension();
        $file_name  = time() . '.' . $file_extenstion;
        $path = 'photos/offers';
        $request->move($path, $file_name);
        return $file_name;
    }
}
