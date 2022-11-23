<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class EmailController extends Controller
{
    public function index()
    {
        $testMailData = [
            'title' => 'Test Email From AllPHPTricks.com',
            'body' => 'This is the body of test email.'
        ];

        FacadesMail::to('mariacolq98@gmail.com')->send(new SendMail($testMailData));

        dd('Success! Email has been sent successfully.');
    }
}