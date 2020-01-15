<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
	/** @test */
	public function can_new_user_signup() {}

	/** @test */
	public function can_officer_accept_member_into_unit() {}

	/** @test */
	public function can_trainer_accept_member_into_unit() {}
}
