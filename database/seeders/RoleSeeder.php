<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=>'Super Admin']);
        $role2=Role::create(['name'=>'Admin']);
        $role3=Role::create(['name'=>'Asesor']); 
        $role4=Role::create(['name'=>'Consultor']); 

        Permission::create(['name'=>'home'])->syncRoles([$role2,$role3,$role4]);
        Permission::create(['name'=>'nomenclators'])->assignRole($role2);
        Permission::create(['name'=>'workers'])->syncRoles([$role2,$role3]);
        Permission::create(['name'=>'users'])->assignRole($role2);
        Permission::create(['name'=>'roles'])->assignRole($role2);

        Permission::create(['name'=>'legal actions'])->syncRoles([$role2,$role3]);


        // Permission::create(['name'=>'admin.actions'])->assignRole($role2);
        // Permission::create(['name'=>'admin.facts'])->assignRole($role2);
        // Permission::create(['name'=>'admin.entities'])->assignRole($role2);        
        // Permission::create(['name'=>'admin.areas'])->assignRole($role2);
        // Permission::create(['name'=>'admin.concepts'])->assignRole($role2);
       

        // Permission::create(['name'=>'law.disciplinaryActions'])->syncRoles([$role2,$role3]);
        // Permission::create(['name'=>'law.responsibilities'])->syncRoles([$role2,$role3]);
        // Permission::create(['name'=>'law.claims'])->syncRoles([$role2,$role3]);
        // Permission::create(['name'=>'law.countClaims'])->syncRoles([$role2,$role3]);

        // Permission::create(['name'=>'appeals'])->syncRoles([$role2,$role3]);
        // Permission::create(['name'=>'revision'])->syncRoles([$role2,$role3]);

        Permission::create(['name'=>'reports'])->syncRoles([$role2,$role3,$role4]);

       

        



      
    }
}
