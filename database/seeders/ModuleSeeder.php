<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            ['name' => 'Announcements', 'slug' => 'announcements'],
            ['name' => 'Payments',      'slug' => 'payments'],
            ['name' => 'Directory',     'slug' => 'directory'],
            ['name' => 'Incidents',     'slug' => 'incidents'],
            ['name' => 'Documents',     'slug' => 'documents'],
            ['name' => 'Amenities',     'slug' => 'amenities'],
        ];

        Module::insertOrIgnore($modules);
    }
}
