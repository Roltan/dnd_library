<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Klass\BardKlassSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AbilitiesSeeder::class);
        $this->call(ProficienciesSeeder::class);
        $this->call(EquipmentSeeder::class);

        // классы
        $this->call(BardKlassSeeder::class);
    }
}
