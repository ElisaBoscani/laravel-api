<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLeadEmail;
use App\Mail\NewLeadEmailMd;

class LeadController extends Controller
{
    function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);
        }

        $lead = Lead::create($request->all());

        Mail::to('elisabosc90@gmail.com')->send(new NewLeadEmail($lead));
        // TODO: send a confirmation email to the user
        /*  Mail::to($lead->email)->send(new NewLeadEmailMd($lead)); */
        /* var_dump($lead); */
        return response()->json(
            [

                'success' => true,
                'message' => 'Form sent successfully '
            ]
        );
    }
}
