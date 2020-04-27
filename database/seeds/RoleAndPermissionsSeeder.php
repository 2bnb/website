<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;

class RoleAndPermissionsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// set all permissions
		$types = [
			'view',
			'create',
			'edit',
			'delete'
		];

		$permissions = [
			Role::class,
			User::class
		];

		foreach ($permissions as $permission) {
			foreach ($types as $type) {
				DB::table('permissions')->insert([
					'model' => $permission,
					'type' => $type
				]);
			}
		}

		// create each role and associate the specific permissions

		$role = Role::create(['name' => 'Admin']);
		$role->permissions()->sync(Permission::all());

		Role::create(['name' => 'NCO']);
		Role::create(['name' => 'Member']);
		Role::create(['name' => 'Guest']);
    }
}
