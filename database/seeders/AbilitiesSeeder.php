<?php

namespace Database\Seeders;

use App\Models\Ability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            [
                'name' => 'Сила',
                'children' => [
                    ['name' => 'Атлетика'],
                ],
            ],
            [
                'name' => 'Ловкость',
                'children' => [
                    ['name' => 'Акробатика'],
                    ['name' => 'Ловкость рук'],
                    ['name' => 'Скрытность'],
                ],
            ],
            [
                'name' => 'Телосложение',
            ],
            [
                'name' => 'Интеллект',
                'children' => [
                    ['name' => 'Магия'],
                    ['name' => 'История'],
                    ['name' => 'Расследование'],
                    ['name' => 'Природа'],
                    ['name' => 'Религия'],
                ],
            ],
            [
                'name' => 'Мудрость',
                'children' => [
                    ['name' => 'Обращение с животными'],
                    ['name' => 'Проницательность'],
                    ['name' => 'Медицина'],
                    ['name' => 'Восприятие'],
                    ['name' => 'Выживание'],
                ],
            ],
            [
                'name' => 'Харизма',
                'children' => [
                    ['name' => 'Обман'],
                    ['name' => 'Запугивание'],
                    ['name' => 'Выступление'],
                    ['name' => 'Убеждение'],
                ],
            ],
        ];

        foreach ($abilities as $abilityData) {
            $parent = Ability::create(['name' => $abilityData['name']]);

            if (isset($abilityData['children']))
                foreach ($abilityData['children'] as $childData)
                    Ability::create([
                        'name' => $childData['name'],
                        'parent_id' => $parent->id,
                    ]);
        }
    }
}
