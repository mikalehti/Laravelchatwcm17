<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Events\MessageCreated;
use Snipe\BanBuilder\CensorWords;


class MessageController extends Controller
{

    /**
     * Function that returns a JSON response containing all our messages
     *
     */
    public function index()
    {
        $messages = Message::with(['user'])->get();

        return response()->json($messages);
    }
    /**
     * Stores the message to the database and broadcasts it in the chat view.
     *
     */
    public function store(Request $request)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body
        ]);

        broadcast(new MessageCreated($message))
                ->toOthers();

        return response()->json($message);
    }
}
