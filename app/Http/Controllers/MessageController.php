<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $messages = ContactMessage::latest()->paginate(10);

        return view('administrator.dashboard', [
            'title' => 'Dashboard - Fercho Sistemas',
            'messages' => $messages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $message)
    {
        return view('administrator.message', [
            'title' => 'Dashboard - Fercho Sistemas',
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('dashboard');
    }
}
