<?php

namespace App\Http\Controllers;
use App\Mail\SupMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from Archit',
            'body' => 'This is test email usin gmail'
        ];
        Mail::to('archituprit.cpcb@nic.in')->send(new SupMail($details));
        return 'Email Sent';
    }
}
