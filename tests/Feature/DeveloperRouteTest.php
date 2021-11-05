<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Developer;

class DeveloperRouteTest extends TestCase
{
    /**
     * @test
     */
    public function get_all_developers()
    {
        $response = $this->get('/api/developers');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_developers_by_id()
    {
        // get a valid developer on database
        $developer = Developer::first();

        $response = $this->get('/api/developers/'.$developer->id);

        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function error_when_pass_a_failure_id()
    {
        $response = $this->get('/api/developers/123');

        $response->assertStatus(404);
    }
}
