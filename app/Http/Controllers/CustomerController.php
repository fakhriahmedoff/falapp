<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request): JsonResponse
    {
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $created = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => isset($request->image) ? $imageName : 'null',
        ]);

        return response()->json([
                'message' => 'Salam ' . $created->name . ' falımıza xoş geldiniz texti',
                'data' => $created,
            ]
        );
    }
}
