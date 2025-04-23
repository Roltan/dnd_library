<?php

namespace Database\Seeders;

use Database\Seeders\Klass\BarbarianKlassSeeder;
use Database\Seeders\Klass\BardKlassSeeder;
use Database\Seeders\Race\DwarfRaceSeeder;
use Database\Seeders\Race\GnomeRaceSeeder;
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
        $this->call(BarbarianKlassSeeder::class);

        // расы
        $this->call(GnomeRaceSeeder::class);
        $this->call(DwarfRaceSeeder::class);
    }
}
