<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UsersTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * Backend tests
	 */
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

	/**
	 * API test
	 */
	/** @test */
	public function can_api_add_new_user() {
		$this->assertTrue(true);
		// $user = factory(User::class)->make()->toArray();
		// $response = $this->json('POST', '/users', $user);

		// $response
		// 	->assertStatus(201)
		// 	->assertJson(['created' => true]);
	}

	/**
	 * Frontend tests
	 */
	/** @test */
	public function can_new_user_signup() {
		$this->assertTrue(true);
	}

	/** @test */
	public function can_officer_accept_member_into_unit() {
		$this->assertTrue(true);
	}

	/** @test */
	public function can_trainer_accept_member_into_unit() {
		$this->assertTrue(true);
	}
}
