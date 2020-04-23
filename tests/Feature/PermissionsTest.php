<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Permission;

class PermissionsTest extends TestCase
{
    /**
	 * Backend tests
	 */
	/** @test */
	public function can_interact_with_database() {
		$permission = factory(Permission::class)->create();
		$originalValues = $permission->toArray();

		$this->assertDatabaseHas('permissions', [
			'model' => $permission->model,
			'type' => $permission->type
		]);

		$permission->model = 'App/TestModel';
		$permission->save();

		$this->assertDatabaseMissing('permissions', $originalValues);

		$this->assertDatabaseHas('permissions', [
			'model' => $permission->model,
			'type' => $permission->type
		]);

		$permission->delete();

		$this->assertSoftDeleted('permissions', [
			'model' => $permission->model,
			'type' => $permission->type
		]);
	}
}
