<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            $response = Http::timeout(60)->get('https://restcountries.com/v3.1/all');
            $countries = $response->json();

            foreach ($countries as $country) {
                Country::updateOrCreate(
                    ['name_en' => $country['name']['common']],
                    [
                        'name_fa' => $country['translations']['per']['official'] ?? $country['name']['common'],
                        'population' => $country['population'] ?? 0,
                        'flag' => $country['flags']['svg'] ?? '',
                        'latitude' => $country['latlng'][0] ?? null,
                        'longitude' => $country['latlng'][1] ?? null
                    ]
                );
            }
        } catch (\Exception $e) {
            // Handle exceptions or log error
            \Log::error('Failed to fetch country data: ' . $e->getMessage());
        }

    }
}
