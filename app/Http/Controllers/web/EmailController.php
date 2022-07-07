<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\FirstEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;


class EmailController extends Controller
{
   public function sendEmail() {

        $to_email = "druva.darshan232@gmail.com";

        Mail::to($to_email)->send(new FirstEmail);

        if(Mail::failures() != 0) {
            return "<p> Success! Your E-mail has been sent.</p>";
        }

        else {
            return "<p> Failed! Your E-mail has not sent.</p>";
        }
    }
}
