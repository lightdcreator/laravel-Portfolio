<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Contact()
    {

        return view('frontend.contact');
    } //end method
}
