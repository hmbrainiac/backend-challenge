<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;

class LanguageRetrievalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retrieval of languages from github
     *
     * @return response
     */
    public function retrieveLanguages()
    {
        $languages = [];
        $tempLanguages = [];

        //Retrieve list of highest stared repositories for the past 30 days
        $response = Curl::to('https://api.github.com/search/repositories')
            ->withHeader('User-Agent: lumen-curl')
            ->withData(array('q' => 'created:>' . Carbon::now()->subDays(30)->toIso8601String(), 'per_page' => 100, 'sort' => 'stars', 'order' => 'desc'))
            ->get();
        return response()->json(['data'=>json_decode($response)]);
    }
}
