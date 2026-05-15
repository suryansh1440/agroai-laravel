<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AIService;
use Illuminate\Support\Facades\Http;

class AgroController extends Controller
{
    protected $aiService;

    public function __construct(AIService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function index()
    {
        return view('dashboard');
    }

    public function cropRecommendation()
    {
        return view('crop-recommendation');
    }

    public function processCropRecommendation(Request $request)
    {
        $request->validate([
            'soil_type' => 'required|string',
            'region' => 'required|string',
        ]);

        $recommendation = $this->aiService->getCropRecommendation($request->soil_type, $request->region);

        return view('crop-recommendation', compact('recommendation'));
    }

    public function pestPrediction()
    {
        return view('pest-prediction');
    }

    public function processPestPrediction(Request $request)
    {
        $request->validate([
            'crop' => 'required|string',
            'city' => 'required|string',
        ]);

        // Get weather data (Mocked for now if no API key)
        $weatherData = "Sunny, 30°C, Humidity 60%"; 
        // In real app, call OpenWeatherMap here.

        $prediction = $this->aiService->getPestRisk($request->crop, $weatherData);

        return view('pest-prediction', compact('prediction'));
    }

    public function irrigationTips()
    {
        return view('irrigation-tips');
    }

    public function processIrrigationTips(Request $request)
    {
        $request->validate([
            'crop' => 'required|string',
            'city' => 'required|string',
        ]);

        // Get weather forecast (Mocked for now)
        $forecast = "Light rain expected on Day 3 and Day 5.";

        $tips = $this->aiService->getIrrigationTips($request->crop, $forecast);

        return view('irrigation-tips', compact('tips'));
    }

    public function chatbot()
    {
        return view('chatbot');
    }

    public function processChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $response = $this->aiService->getChatbotResponse($request->message);

        return response()->json(['response' => $response]);
    }
}
