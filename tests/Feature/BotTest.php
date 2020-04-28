<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Bot;

class BotTest extends TestCase
{
    /**
	 * Backend tests
	 */
	/** @test */
	public function can_interact_with_database() {
		$bot = factory(Bot::class)->create();
		$originalValues = $bot->toArray();

		$this->assertDatabaseHas('bots', [
			'name' => $bot->name,
			'description' => $bot->description
		]);

		$bot->name = 'BOT_TEST_NAME';
		$bot->name = 'BOT_TEST_DESCRIPTION';
		$bot->save();

		$this->assertDatabaseMissing('bots', $originalValues);

		$this->assertDatabaseHas('bots', [
			'name' => $bot->name,
			'description' => $bot->description
		]);

		$bot->delete();

		$this->assertSoftDeleted('bots', [
			'name' => $bot->name,
			'description' => $bot->description
		]);
	}
}
