<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Role;

class RolesTest extends TestCase
{
    /**
	 * Backend tests
	 */
	/** @test */
	public function can_interact_with_database() {
		$roles = factory(Role::class, 3)->create();

		$this->assertDatabaseHas('roles', [
			'name' => $roles->first()['name']
		]);
	}
}
