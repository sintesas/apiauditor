<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

use App\Models\User;
use App\Mail\DemoMail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $email = base64_encode($request->get('email'));
        $mailData = [
            'title' => 'Mail from Laravel API',
            'body' => 'This is for testing email using smtp.',
            'email' => $email
        ];
         
        Mail::to($request->get('email'))->send(new DemoMail($mailData));
           
        return response()->json(array("mensaje" => "Email is sent successfully.", 'tipo' => 0));
    }
}
