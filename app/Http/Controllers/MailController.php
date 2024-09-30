<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send ()
    {
        
        Mail::to('nticketm@gmail.com')->send(new MyMail());
    }
}
