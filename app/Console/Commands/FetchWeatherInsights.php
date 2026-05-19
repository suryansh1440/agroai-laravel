<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FarmInsight;
use Illuminate\Support\Facades\Http;

class FetchWeatherInsights extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insights:fetch-weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch real-time weather data and create a farm insight if rain is expected';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fetching weather data...');

        // For demonstration, we'll fetch data for a central agricultural hub (e.g., Maharashtra)
        // In a real application, you might loop through users and use their saved locations.
        $lat = 19.7515;
        $lon = 75.7139;

        $response = Http::get("https://api.open-meteo.com/v1/forecast", [
            'latitude' => $lat,
            'longitude' => $lon,
            'daily' => 'precipitation_sum',
            'timezone' => 'auto'
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $rainExpected = false;
            $rainDay = '';

            // Check next 3 days for rain
            foreach (array_slice($data['daily']['precipitation_sum'], 1, 3) as $index => $precip) {
                if ($precip > 5.0) { // More than 5mm rain
                    $rainExpected = true;
                    $rainDay = \Carbon\Carbon::parse($data['daily']['time'][$index + 1])->diffForHumans();
                    break;
                }
            }

            if ($rainExpected) {
                FarmInsight::create([
                    'type' => 'weather',
                    'title' => 'Weather Alert',
                    'message' => "Heavy rain expected {$rainDay}. Please adjust your irrigation schedules to prevent waterlogging."
                ]);
                $this->info('Rain alert insight created!');
            } else {
                FarmInsight::create([
                    'type' => 'weather',
                    'title' => 'Clear Skies Ahead',
                    'message' => 'No significant rainfall expected in the next 3 days. Maintain regular irrigation.'
                ]);
                $this->info('Clear weather insight created!');
            }
        } else {
            $this->error('Failed to fetch weather data.');
        }
    }
}
