<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ChallengeTestCases extends TestCase
{
    /**
     * A test to check if the application returns a results with the error code = 0.
     *
     * @return void
     */
    public function testExample()
    {
        
        $response = $this->get('/most-used-languages');

        $this->assertEquals(200, $response->status());
    }
}
