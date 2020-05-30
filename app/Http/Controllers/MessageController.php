<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MessageController extends Controller
{
    public function store (){

        $msg = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'mensaje' => 'required|min:10'
        ]);

        // Enviar Email

        Mail::to('efraindeleon12@outlook.com')->queue(new MessageReceived($msg));
        return back()->with('sesion','Recibimos tu mensaje, te contestaremos en menos de 24 horas');
     }
}
