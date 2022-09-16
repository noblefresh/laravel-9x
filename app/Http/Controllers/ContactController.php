<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function save_data(request $request)
    {
        if(isset($request->name) && isset($request->email) && isset($request->tel)){
            // proccess data
            $contact = new contact;
            $contact->email = $request->email;
            $contact->name = $request->name;
            $contact->tel = $request->tel;
            if ($contact->save()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data saved successfully',
                    'data' => $contact
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'An error occured'
                ],500);
            }
            
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Missing Paramiter'
            ],501);
        }
    }

    public function fetch_data()
    {
        $fetch = contact::latest()->get();
        if ($fetch) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data fetched successfully',
                'data' => $fetch
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occured'
            ],500);
        }
        
    }
}
