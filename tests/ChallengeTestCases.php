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
        $response = $this->call('GET', '/most-used-languages');        
        $this->assertEquals(200, $response->status());
    }

}
