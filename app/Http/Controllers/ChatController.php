<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiChatbotService;

class ChatController extends Controller
{
    protected $chatbotService;

    public function __construct(GeminiChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    public function index()
    {
        return view('chat'); // Create a blade file in /resources/views/chat.blade.php
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $response = $this->chatbotService->sendMessage($message);

        return response()->json(['response' => $response]);
    }
}
