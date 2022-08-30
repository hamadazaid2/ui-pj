<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OfferTestController extends Controller
{
    //

    use OfferTrait;


    public function __construct()
    {
    }

    public function getOffers()
    {
        $offers = Offer::select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'price',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
            'photo'
        )->get();
        return view('offers.showAll', compact('offers'));
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(OfferRequest $request)
    {


        // $validator = Validator::make($request->all(), $request->rules(), $request->messages());

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInputs($request->all());
        //     // return $validator->errors()->first();
        // }


        // SAVE PHOTO IN FOLDER


        // $photo_name_extenstion = $path.'/'.$file_name;

        $file_name = $this->savePhoto($request->photo, 'images/offers');
        // $request->photo

        Offer::create(
            [
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'price' => $request->price,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'photo' => $file_name,
            ]
        );
        return redirect()->back()->with('success', "تم إضافة العرض بنجاح");
    }



    public function edit($id)
    {
        // Offer::findOrFail($id);
        // $offer = Offer::find($id);
        $offer = Offer::select('id', 'name_ar', 'name_en', 'price', 'details_ar', 'details_en')->find($id);
        if (!$offer) {
            return redirect()->to(route('offer.all'));
        }

        return view('offers.edit', compact('offer'));
    }

    public function update(OfferRequest $request, $id)
    {

        $offer = Offer::find($id);

        if (!$offer) {
            return redirect()->back();
        }
        $file_name = $this->savePhoto($request->photo, 'images/offers');
        $offer->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'photo' => $file_name,
        ]);
        return redirect()->to(route('offer.all'))->with('success', 'تم تحديث البيانات');
    }

    public function delete($id)
    {
        $offer = Offer::find($id);
        if(!$offer){
            return redirect()->back();
        }

        $offer->delete();
        return redirect()->to(route('offer.all'))->with('success', 'تم الحذف بنجاح ');
    }


    // public function store (){
    //     Offer::create (
    //         [
    //             'name' => "Offer 3",
    //             'price' => '30',
    //             "details" => "This is Offer 3"
    //         ]
    //     );
}
