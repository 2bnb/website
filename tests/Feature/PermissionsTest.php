<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionsTest extends TestCase
{
    /**
	 * Backend tests
	 */
	/** @test */
	public function can_interact_with_database() {
		$permissions = factory(Permission::class, 4)->create();

		$this->assertDatabaseHas('permissions', [
			'model' => $permissions->first()['model'],
			'type' => $permissions->first()['type']
		]);
	}
}
