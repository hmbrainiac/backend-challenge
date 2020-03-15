<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Flugg\Responder\Responder;
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
    public function retrieveLanguages(Responder $responder)
    {
        $languages = [];

        //Retrieve list of highest stared repositories for the past 30 days
        $response = json_decode(Curl::to('https://api.github.com/search/repositories')
                ->withHeader('User-Agent: lumen-curl')
                ->withData(array('q' => 'created:>' . Carbon::now()->subDays(30)->toIso8601String(), 'per_page' => 100, 'sort' => 'stars', 'order' => 'desc'))
                ->get());
        foreach ($response->items as $value) {
            $responseObject = new \stdClass;
            if (!array_key_exists($value->language, $languages)) {
                $responseObject->numberRepos = 1;
                $responseObject->language = $value->language;
                $responseObject->listRepos[0] = $value;
            } else {
                $responseObject = $languages[$value->language];
                $responseObject->listRepos[$responseObject->numberRepos] = $value;
                $responseObject->numberRepos++;
            }
            $languages[$value->language] = $responseObject;
        }
        return response()->json(['error' => ["code" => "00", "message" => "Most languages used retrieved"], 'count' => sizeof($languages), 'data' => $languages]);
    }
}
