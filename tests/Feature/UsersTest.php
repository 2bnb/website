<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UsersTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function can_interact_with_database() {
		$this->assertDatabaseMissing('users', [
			'uuid' => '2e6ae8e2-95ab-46e6-96b1-ec7f21e08ec8'
		]);

		$users = factory(User::class, 10)->create();
		$this->assertDatabaseHas('users', [
			'uuid' => $users->first()['uuid'],
			'country' => null
		]);

		$users = factory(User::class, 10)->state('full')->create();
		$this->assertDatabaseHas('users', [
			'country' => $users->first()['country']
		]);
	}

	/** @test */
	public function can_new_user_signup() {}

	/** @test */
	public function can_officer_accept_member_into_unit() {}

	/** @test */
	public function can_trainer_accept_member_into_unit() {}
}
