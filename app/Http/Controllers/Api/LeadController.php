<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{

    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($data,
            [
                'name' => 'string|required|max:100|min:3',
                'email' => 'email|required|max:100|min:3',
                'phone' => 'digits:10',
                'address' => 'required|string|max:255',
            ]
        );

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        Mail::to($lead->email)->send(new NewContact($lead));

        return response()->json([
            'success' => true
        ]);
    }
}