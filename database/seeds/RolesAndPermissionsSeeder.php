<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        DB::table('users')->truncate();
        DB::table('roles')->truncate();

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'users']);
        $permission_quotes = Permission::create(['name' => 'quotes']);
        $permission_pickups = Permission::create(['name' => 'pickups']);

        $role = Role::create(['name' => 'Administrator']);
        $role->givePermissionTo(Permission::all());
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => ' ',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'active' => 1
        ]);
        $user->assignRole($role->name);

        // customer role
        $customer = Role::create(['name' => 'Customer']);
        $customer->givePermissionTo($permission_quotes);
        $customer->givePermissionTo($permission_pickups);

    }

}
