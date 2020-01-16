<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Config;

class ConfigsTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
    public function databaseHasConfigs()
    {
    	$value = '2nd Battalion, Nord Brigade';

    	$this->assertDatabaseMissing('configs', [
    		'name' => $value
    	]);

    	$siteName = factory(Config::class)->create([
    		'name' => $value
    	]);
    	$configs = factory(Config::class, 10)->create();
    	$configs = factory(Config::class, 5)->state('values')->create();

        $this->assertDatabaseHas('configs', [
        	'name' => $siteName['name']
        ]);
    }
}
