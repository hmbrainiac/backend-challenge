<?php
namespace App\Traits;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;

trait RetrieveRepos
{

    /**
     * Fetch most starred repositories from github
     * @return object
     */
    public function fetchMostStarred(int $pastDays, int $resultsPerPage)
    {
        return json_decode(Curl::to('https://api.github.com/search/repositories')
        ->withHeader('User-Agent: lumen-curl')
        ->withData(array('q' => 'created:>' . Carbon::now()->subDays($pastDays)->toIso8601String(), 'per_page' => $resultsPerPage, 'sort' => 'stars', 'order' => 'desc'))
        ->get()); 
    }
  
}
