<?php

namespace App\Http\Controllers;

use App\Mail\TestingMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller implements ShouldQueue
{
    public function index(){
        Mail::to('james@gmail.com')
        ->cc('khan@hotmail.com')
        ->send(new TestingMail());
    }
}
