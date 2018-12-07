<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /** @test */
    public function BasicTest()
    {
        $this->get('/');

        $this->seeText('Laravel');
    }
}
