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
		$testRole = $roles->first();
		$originalValues = $testRole->toArray();

		$this->assertDatabaseHas('roles', [
			'name' => $testRole->name
		]);

		$testRole->name = 'TEST-ROLE';
		$testRole->save();

		$this->assertDatabaseMissing('roles', $originalValues);

		$this->assertDatabaseHas('roles', [
			'name' => 'TEST-ROLE'
		]);

		$testRole->delete();

		$this->assertSoftDeleted('roles', [
			'name' => $testRole->name
		]);
	}
}
