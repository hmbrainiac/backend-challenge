<?php

use Illuminate\Http\Response;

class ChallengeTestCases extends TestCase
{

    /**
     * A test to check if the application returns a results with the error code = 0.
     *
     * @return void
     */
    public function testChallenge()
    {        
        $response = $this->json('GET', '/most-used-languages', [], ['Authorization'=>'Basic '.base64_encode(env('API_USERNAME') . ":" . env('API_PASSWORD'))]);
        $this->assertEquals(200, $this->response->status());
    }

}
