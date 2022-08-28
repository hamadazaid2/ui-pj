<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferTestController extends Controller
{
    //


    public function __construct()
    {
    }

    public function getOffers()
    {
        return Offer::get();
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {

        $rules = [
            "name" => "required|max:10|unique:offers,name",
            "price" => "required|numeric",
            "details" => "required",
        ];
        $messages = [
            'name.required' => __("messages.offerNameRequired"),
            'price.required' => __("messages.offerPriceRequired"),
            'details.required' => __("messages.offerDetailsRequired"),
            'name.unique' => __("messages.offerNameRequired"),
            "name.max"=> __("messages.offerNamemax"),
            "price.numeric" => __("messages.offerPriceNumeric")
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
            // return $validator->errors()->first();
        }
        Offer::create(
            [
                'name' => $request->name,
                'price' => $request->price,
                'details' => $request->details,
            ]
        );
        return redirect()->back()->with('success', "تم إضافة العرض بنجاح");
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
