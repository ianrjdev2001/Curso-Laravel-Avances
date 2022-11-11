<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContactanosMailable;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index()
    {
        return view('contactanos.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'correo' => 'required',
            'mensaje' => 'required'

        ]);
        $correo = new ContactanosMailable($request->all());
        Mail::to('iananonimouwu@gmail.com')->send($correo);

        return redirect()->route('contactanos.index')->with('info','Mensaje Enviado');
    }
}
