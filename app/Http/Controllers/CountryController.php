<?php

// app/Http/Controllers/CountryController.php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return view('countries.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $countries = Country::where('name_fa', 'LIKE', "%{$query}%")
            ->orWhere('name_en', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($countries);
    }
}
