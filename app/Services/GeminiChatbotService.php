<?php

namespace App\Services;

use Google\Client;
use Google\Service\GenerativeLanguage;
use Google\Service\GenerativeLanguage\GenerateContentRequest;
use Google\Service\GenerativeLanguage\Content;
use Google\Service\GenerativeLanguage\Part;

class GeminiChatbotService
{
    private $client;
    private $generativeLanguageService;
    private $modelName;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName('Gemini Chatbot');
        $this->client->setDeveloperKey(config('services.google.api_key'));  //Using config instead of .env
        $this->generativeLanguageService = new GenerativeLanguage($this->client);

        // Choose your model, e.g., gemini-pro, gemini-1.5-pro (make sure it's enabled)
        $this->modelName = 'models/gemini-pro';
    }

    public function sendMessage(string $message): ?string
    {
        try {
            $part = new Part();
            $part->setText($message);

            $content = new Content();
            $content->setParts([$part]);

            $request = new GenerateContentRequest();
            $request->setContents([$content]);

            $response = $this->generativeLanguageService
                ->models
                ->generateContent($this->modelName, $request);

            if (isset($response->candidates[0]->content->parts[0]->text)) {
                return $response->candidates[0]->content->parts[0]->text;
            } else {
                 return "I'm sorry, I didn't understand that. Please try again.";
            }

        } catch (\Exception $e) {
            // Log error for debugging, in a real app, you'd probably want to handle this better
            \Log::error("Gemini API Error: " . $e->getMessage());
            return "An error occurred while processing your request. Please try again later.";
        }
    }
}
