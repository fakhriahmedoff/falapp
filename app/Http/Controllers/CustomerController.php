<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRegisterRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function createUser(Request $request){


        if ($request->image){
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        }

        $created = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => isset($request->image) ? $imageName : 'null' ,
        ]);


        return response()->json([
                'message'=> 'Salam '.$created->name.' falımıza xoş geldiniz texti',
                'data' => $created,
            ]
        );


    }
}
