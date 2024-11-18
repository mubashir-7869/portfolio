<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function sendMessage(Request $request)
    {
        // dd($request->all());
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $details = [
            'to' => 'mubashrhussain41@gmail.com',
            'fromEmail' => $request->email,
            'fromName' => $request->name,
            'fromEmail' => $request->email,
            'subject' => ' Contact Form Message',
            'mailData' => $request->message,
        ];
        Mail::send(new ContactFormMail(
            $details['fromName'],
            $details['fromEmail'],
            $details['to'],
            $details['subject'],
            $details['mailData']
        ));
        dd( $details);
        return back()->with('success', 'Your message has been sent successfully!');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
