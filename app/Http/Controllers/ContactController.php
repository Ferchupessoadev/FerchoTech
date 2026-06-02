<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestContact;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(FormRequestContact $request)
    {
        $data = $request->all();

        ContactMessage::create($data);

        return back()->with('success', '¡Gracias ' . $data['name'] . '! Mensaje recibido, te contactaremos pronto.');
    }
}
