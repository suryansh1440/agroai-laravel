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
        $insights = \App\Models\FarmInsight::orderBy('created_at', 'desc')->take(5)->get();
        return view('dashboard', compact('insights'));
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
            'nitrogen' => 'nullable|numeric',
            'phosphorus' => 'nullable|numeric',
            'potassium' => 'nullable|numeric',
            'ph_level' => 'nullable|numeric',
        ]);

        $jsonResult = $this->aiService->getCropRecommendation($request->all());
        $recommendation = json_decode($jsonResult, true);

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
            'stage' => 'required|string',
            'city' => 'required|string',
            'temperature' => 'nullable|numeric',
            'humidity' => 'nullable|numeric',
        ]);

        $jsonResult = $this->aiService->getPestRisk($request->all());
        $prediction = json_decode($jsonResult, true);

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
            'soil' => 'required|string',
            'temperature' => 'nullable|numeric',
            'precipitation' => 'nullable|numeric',
        ]);

        $jsonResult = $this->aiService->getIrrigationTips($request->all());
        $tips = json_decode($jsonResult, true);

        return view('irrigation-tips', compact('tips'));
    }

    public function chatbot()
    {
        $history = session('chat_history', []);
        return view('chatbot', compact('history'));
    }

    public function processChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $history = session('chat_history', []);
        $history[] = ['role' => 'user', 'content' => $request->message];

        $response = $this->aiService->getChatbotResponse($history);

        $history[] = ['role' => 'assistant', 'content' => $response];

        if (count($history) > 20) {
            $history = array_slice($history, -20);
        }
        session(['chat_history' => $history]);

        return response()->json(['response' => $response]);
    }

    public function clearChat()
    {
        session()->forget('chat_history');
        return redirect()->route('chatbot');
    }
}
