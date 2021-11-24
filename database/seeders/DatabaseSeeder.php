<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Action;
use App\Models\Area;
use App\Models\Entity;
use App\Models\Fact;
use App\Models\Concept;
use App\Models\worker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RoleSeeder::class,UsersTableSeeder::class]);

        Action::factory(20)->create();
        Entity::factory(20)->create();
        Fact::factory(25)->create();
        Concept::factory(10)->create();
        Area::factory(15)->create();
        Worker::factory(15)->create();
    }
}
