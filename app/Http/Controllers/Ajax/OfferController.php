<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    //
    use OfferTrait;

    public function create()
    {
        return view('ajaxOffers.create');
    }

    public function store(OfferRequest $request)
    {
        $file_name = $this->savePhoto($request->photo, 'images/offers');

        $offer = Offer::create(
            [
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'price' => $request->price,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'photo' => $file_name,
            ]
        );

        if ($offer) {
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ'
            ]);
        }
        // return redirect()->back()->with('success', "تم إضافة العرض بنجاح");
    }
}
