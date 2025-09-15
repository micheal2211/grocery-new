<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Display a listing of the messages
    public function show(Message $message)
{
    return view('messages.show', compact('message'));
}

public function edit(Message $message)
{
    return view('messages.edit', compact('message'));
}

public function update(Request $request, Message $message)
{
    $message->update($request->validated());
    return redirect()->route('messages.index');
}

public function destroy(Message $message)
{
    $message->delete();
    return redirect()->route('messages.index');
}


}



