<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Property;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\{Validator};

class PropertyController
{

    public function create(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $property = [
            'description'=>$request->description,
            'price'=>$request->price,
            'type'=>$request->type

        ];

        if (auth()->attempt($credentials)) {
           $token = auth()->user()->createToken('AppNAME')->accessToken;
           return response()->json(['token' => $token], 200);


            $properties = Property::create($property);

            $token = $properties->createToken('AppNAME')->accessToken;

            return response()->json(['token' => $token], 200);
        } else
            return response()->json(['error' => 'UnAuthorised'], 401);

    }

    public function show($id)
    {
        $property = auth()->user()->properties()->find($id);

        if (!$property) {
            return response()->json([
                'success' => false,
                'message' => 'Property with id ' . $id . ' not found'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $property->toArray()
        ], 400);
    }
}