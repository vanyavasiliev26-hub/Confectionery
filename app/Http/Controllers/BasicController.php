<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Redirect;

class BasicController extends Controller
{
    public function index() {
        return view('static.home');
    }

    public function sale() {
        return view('static.Sale');
    }

    public function about() {
        return view('static.about');
    }

    public function contact() {
        return view('static.contact');
    }

    public function profile() {
        return view('static.profile');
    }


    public function submit(ContactRequest $request) {

        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->text = $request->input('message');
        $message->save();

        return redirect()->route('home');
    }
}
