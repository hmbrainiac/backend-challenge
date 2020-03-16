<?php

namespace App\Http\Controllers;


use App\Traits\ResponseTransformer;
use App\Traits\RetrieveRepos;

class LanguageRetrievalController extends Controller
{
    use ResponseTransformer;
    use RetrieveRepos;
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

        //Retrieve list of highest 100 starred repositories for the past 30 days
        $response = $this->fetchMostStarred(30, 100);        
        //Format response
        $formattedResponse = $this->formatResponse($response->items);

        //Return response
        return response()->json(['error' => ["code" => "00", "message" => "Most languages used retrieved"], 'count' => sizeof($formattedResponse), 'data' => $formattedResponse]);
    }
}
