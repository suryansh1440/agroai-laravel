<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;

class AIService
{
    /**
     * Get crop recommendations based on soil type and region.
     */
    public function getCropRecommendation($data)
    {
        $n = $data['nitrogen'] ?? 'N/A';
        $p = $data['phosphorus'] ?? 'N/A';
        $k = $data['potassium'] ?? 'N/A';
        $ph = $data['ph_level'] ?? 'N/A';
        $region = $data['region'] ?? 'Unknown';
        $soilType = $data['soil_type'] ?? 'Unknown';

        $prompt = "As an agricultural expert, suggest the single BEST crop suitable for a farm with the following parameters:
- Location/Region: {$region}
- Soil Type: {$soilType}
- Nitrogen (N): {$n}
- Phosphorus (P): {$p}
- Potassium (K): {$k}
- pH Level: {$ph}

Return ONLY a valid JSON object matching this exact structure:
{
  \"crop_name\": \"Name of the Crop\",
  \"reasoning\": \"A short paragraph explaining why this crop is the best fit.\",
  \"advantages\": [\"Advantage 1\", \"Advantage 2\", \"Advantage 3\"],
  \"disadvantages\": [\"Risk 1\", \"Risk 2\"],
  \"estimated_yield\": \"Estimated yield per hectare/acre\",
  \"growth_duration\": \"Estimated time from planting to harvest\",
  \"market_demand\": \"High/Medium/Low with a short reason\"
}";

        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a professional agricultural advisor. You must respond only in JSON.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);
            return $result->choices[0]->message->content;
        } catch (\Exception $e) {
            // Fallback mock JSON if OpenAI key is missing or fails
            return json_encode([
                "crop_name" => "Wheat (Mock Data)",
                "reasoning" => "Based on the {$soilType} soil in {$region}, wheat is an excellent choice due to its high adaptability and current market demand.",
                "advantages" => ["High yield potential", "Drought resistant varieties available", "Strong government MSP support"],
                "disadvantages" => ["Requires precise irrigation scheduling", "Susceptible to rust diseases"],
                "estimated_yield" => "4-5 tons/hectare",
                "growth_duration" => "120-150 days",
                "market_demand" => "High - Staple food crop"
            ]);
        }
    }

    /**
     * Predict pest risks based on crop and weather data.
     */
    public function getPestRisk($data)
    {
        $crop = $data['crop'] ?? 'Unknown Crop';
        $stage = $data['stage'] ?? 'Unknown Stage';
        $location = $data['city'] ?? 'Unknown Location';
        $temp = $data['temperature'] ?? 'N/A';
        $humidity = $data['humidity'] ?? 'N/A';

        $prompt = "As an expert plant pathologist, analyze the pest risks for the following scenario:
- Crop: {$crop}
- Growth Stage: {$stage}
- Location: {$location}
- Current Weather: {$temp}°C with {$humidity}% humidity.

Return ONLY a valid JSON object matching this exact structure:
{
  \"overall_risk\": \"High/Medium/Low\",
  \"summary\": \"A short 2-sentence summary explaining the overall risk.\",
  \"pests\": [
    {
      \"name\": \"Name of the Pest\",
      \"risk_level\": \"High/Medium/Low\",
      \"weather_factor\": \"Short explanation of why the current weather invites this pest.\",
      \"preventive_measures\": [\"Measure 1\", \"Measure 2\"]
    }
  ]
}
Note: Return maximum 3 pests in the array.";

        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a plant pathologist and pest control expert. You must respond only in JSON.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);
            return $result->choices[0]->message->content;
        } catch (\Exception $e) {
            return json_encode([
                "overall_risk" => "Medium",
                "summary" => "Mock Data: Weather conditions show moderate humidity which may promote early-stage fungal infections or common aphids.",
                "pests" => [
                    [
                        "name" => "Aphids (Mock)",
                        "risk_level" => "High",
                        "weather_factor" => "Warm temperatures and moderate humidity are ideal for rapid aphid reproduction.",
                        "preventive_measures" => ["Introduce ladybugs", "Apply neem oil spray"]
                    ],
                    [
                        "name" => "Powdery Mildew (Mock)",
                        "risk_level" => "Medium",
                        "weather_factor" => "Can develop if humidity rises overnight while foliage is dense.",
                        "preventive_measures" => ["Ensure proper plant spacing for airflow", "Avoid overhead watering"]
                    ]
                ]
            ]);
        }
    }

    /**
     * Get irrigation tips based on rainfall forecast.
     */
    public function getIrrigationTips($data)
    {
        $crop = $data['crop'] ?? 'Unknown Crop';
        $location = $data['city'] ?? 'Unknown Location';
        $soil = $data['soil'] ?? 'Unknown Soil';
        $temp = $data['temperature'] ?? 'N/A';
        $precip = $data['precipitation'] ?? 'N/A';

        $prompt = "As an expert agricultural water management specialist, analyze the irrigation needs for the following scenario:
- Crop: {$crop}
- Location: {$location}
- Soil Type: {$soil}
- Current Weather: {$temp}°C with {$precip}mm precipitation (rainfall).

Return ONLY a valid JSON object matching this exact structure:
{
  \"water_requirement\": \"High/Medium/Low/None\",
  \"summary\": \"A short 2-sentence summary explaining the current water needs.\",
  \"schedule\": [
    {
      \"time\": \"Morning/Evening/etc\",
      \"action\": \"Short description of what to do (e.g., Run drip irrigation for 2 hours)\"
    }
  ],
  \"warnings\": [\"Warning 1 (e.g. Risk of waterlogging due to heavy rain and clay soil)\"]
}
Note: Return maximum 3 schedule items and maximum 2 warnings.";

        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    ['role' => 'system', 'content' => 'You are an irrigation and water management expert. You must respond only in JSON.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);
            return $result->choices[0]->message->content;
        } catch (\Exception $e) {
            return json_encode([
                "water_requirement" => "Medium",
                "summary" => "Mock Data: Due to moderate temperatures and average soil retention, standard irrigation is required.",
                "schedule" => [
                    [
                        "time" => "Morning (6:00 AM - 8:00 AM)",
                        "action" => "Apply 10mm of water to ensure deep root penetration before peak heat."
                    ]
                ],
                "warnings" => [
                    "Monitor soil moisture closely if temperatures rise unexpectedly."
                ]
            ]);
        }
    }

    /**
     * Multilingual chatbot response.
     */
    public function getChatbotResponse(array $history)
    {
        $messages = [
            ['role' => 'system', 'content' => 'You are AgroAI, a helpful agricultural assistant. You can speak English, Hindi, and Punjabi. Respond in the same language as the user query. Format your response beautifully using Markdown.']
        ];

        // Append the actual conversation history
        foreach ($history as $msg) {
            $messages[] = $msg;
        }

        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => $messages,
        ]);

        return $result->choices[0]->message->content;
    }
}
