<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\BotLog;

class BotLogTest extends TestCase
{
	/**
	 * Generate a raw DB query to search for a JSON field.
	 *
	 * @param  array|json  $json
	 *
	 * @throws \Exception
	 *
	 * @return \Illuminate\Database\Query\Builder
	 */
	private function castToJson($json)
	{
		// Convert from array to json and add slashes, if necessary.
		if (is_array($json)) {
			$json = addslashes(json_encode($json));
		}
		// Or check if the value is malformed.
		elseif (is_null($json) || is_null(json_decode($json))) {
			throw new \Exception('A valid JSON string was not provided.');
		}
		return \DB::raw("CAST('{$json}' AS JSON)");
	}

    /**
	 * Backend tests
	 */
	/** @test */
	public function can_interact_with_database() {
		$bot_logs = factory(BotLog::class, 3)->create();
		$bot_log = $bot_logs->first();
		$originalValues = $bot_log->toArray();

		$this->assertDatabaseHas('bot_logs', [
			'bot_uuid' => $bot_log->bot_uuid,
			'data' => $this->castToJson($bot_log->data)
		]);

		$bot_log->data = json_encode(['message' => 'BOT_TEST_MESSAGE']);
		$bot_log->save();

		$this->assertDatabaseMissing('bot_logs', $originalValues);

		$this->assertDatabaseHas('bot_logs', [
			'bot_uuid' => $bot_log->bot_uuid,
			'data' => $this->castToJson($bot_log->data)
		]);
	}


}
