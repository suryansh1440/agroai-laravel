<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;

class AIService
{
    /**
     * Get crop recommendations based on soil type and region.
     */
    public function getCropRecommendation($soilType, $region)
    {
        $prompt = "As an agricultural expert, suggest the top 3 crops suitable for a farm with '{$soilType}' soil in the '{$region}' region. Provide reasons for each and estimated harvest time. Format the output in a professional, easy-to-read manner with sections.";

        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a professional agricultural advisor.'],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        return $result->choices[0]->message->content;
    }

    /**
     * Predict pest risks based on crop and weather data.
     */
    public function getPestRisk($crop, $weatherData)
    {
        $prompt = "Based on the crop '{$crop}' and the following weather conditions: '{$weatherData}', predict the top 3 likely pest risks. For each, provide a risk level (Low, Medium, High) and 2-3 preventive measures. Format the output clearly.";

        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a plant pathologist and pest control expert.'],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        return $result->choices[0]->message->content;
    }

    /**
     * Get irrigation tips based on rainfall forecast.
     */
    public function getIrrigationTips($crop, $rainfallForecast)
    {
        $prompt = "The rainfall forecast for the next 5 days for a '{$crop}' farm is: '{$rainfallForecast}'. Provide smart irrigation tips to optimize water usage. Mention if irrigation should be skipped or reduced. Format the output with bullet points.";

        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a water management expert for agriculture.'],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        return $result->choices[0]->message->content;
    }

    /**
     * Multilingual chatbot response.
     */
    public function getChatbotResponse($message)
    {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'You are AgroAI, a helpful agricultural assistant. You can speak English, Hindi, and Punjabi. Respond in the same language as the user query.'],
                ['role' => 'user', 'content' => $message],
            ],
        ]);

        return $result->choices[0]->message->content;
    }
}
