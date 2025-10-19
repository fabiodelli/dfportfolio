<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        /*  dd($request->all()); */
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('delli.fabio@gmail.com')->send(new NewLead($newLead));
        return response()->json([
            'success' => true,
        ]);
    }
}