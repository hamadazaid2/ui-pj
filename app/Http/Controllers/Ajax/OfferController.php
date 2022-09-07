<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OfferController extends Controller
{
    //
    use OfferTrait;

    public function index()
    {
        $offers = Offer::select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'price',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
            'photo'
        )->get();
        return view('ajaxOffers.showAll', compact('offers'));
    }

    public function create()
    {
        return view('ajaxOffers.create');
    }

    public function store(OfferRequest $request)
    {
        $file_name = null;
        if ($request->phote != NULL) {
            $file_name = $this->savePhoto($request->photo, 'images/offers');
        }


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

    public function delete(Request $request)
    {
        $offer = Offer::find($request->id);
        $delete_offer = $offer->delete();
        if ($delete_offer) {
            return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request->id,
            ]);
        } else {
            return response()->json([
                'status' => true,
                'msg' => 'فشل الحذف',
            ]);
        }
    }
    public function edit($id)
    {
        // Offer::findOrFail($id);
        // $offer = Offer::find($id);
        $offer = Offer::select('id', 'name_ar', 'name_en', 'price', 'details_ar', 'details_en')->find($id);
        if (!$offer) {
            return redirect()->to(route('offer.all'));
        }

        return view('ajaxOffers.edit', compact('offer'));
    }

    public function update(Request $request)
    {

        $offer = Offer::find($request->id);
        if (!$offer) {
            return response()->json([
                'status' => false,
                'msg' => 'عذراً لم يتم ايجاد العرض'
            ]);
        }
        $file_name = NULL;
        if ($request->photo != null) {
            $file_name = $this->savePhoto($request->photo, 'images/offers');
        }

        $offer->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'photo' => $file_name,
        ]);
        return response()->json([
            'status' => true,
            'msg' => 'تم تحديث العرض'
        ]);
    }
}
