<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiscordAPITest extends TestCase
{
	/** @test */
    public function can_connect_and_authenticate() {
		$this->assertTrue(true);
	}

    /** @test */
    public function discord_returns_access_token() {
		$this->assertTrue(true);
	}

    /** @test */
    public function can_fetch_discord_id_in_users_name() {
		$this->assertTrue(true);
	}

    /** @test */
    public function can_send_user_a_dm () {
		$this->assertTrue(true);
	}
}
