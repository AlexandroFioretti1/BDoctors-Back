<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_name_surname' => ['nullable'],
            'text' => ['nullable'],
            'user_id' => ['nullable'],
            'date' => ['nullable'],
            'email' => ['nullable']
        ]);

        $slug = $request->validate(['slug' => ['nullable']]);

        $superSlug = $slug["slug"];

        $newMessage = Message::create($validatedData);

        return redirect("http://localhost:5174/single-profile/" . $superSlug);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update($messageId)
    {

        $message = Message::findOrFail($messageId);
        $message->read = true;
        $message->save();
    
        return response()->json(['message' => 'Messaggio contrassegnato come letto'], 200);


        // $message->update($message->read);

    }
}