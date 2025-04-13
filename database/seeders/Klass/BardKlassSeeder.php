<?php

namespace Database\Seeders\Klass;

use App\Models\Ability;
use App\Models\Klass;
use App\Models\Proficiency;
use App\Models\SubKlass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BardKlassSeeder extends Seeder
{
    public function run()
    {
        // 1. Создаем основной класс
        $bard = Klass::create([
            'name' => 'Бард',
            'manual' => 'https://dnd.su/class/88-bard/',
            'source' => 'Player`s handbook',
            'dice_hp' => 8,
            'save_stat' => [3, 20], // Ловкость (id=3) и Харизма (id=20)
            'abilities_count' => 3,
            'equipment' => [
                [
                    [
                        "items" => [
                            [
                                "type" => "11",
                                "count" => 1
                            ],
                            [
                                "type" => "1",
                                "count" => 1
                            ],
                            [
                                "type" => "4",
                                "count" => 1
                            ],
                            [
                                "type" => "8",
                                "count" => 1
                            ],
                            [
                                "type" => "9",
                                "count" => 1
                            ]
                        ]
                    ],
                    [
                        "items" => [
                            [
                                "type" => "16",
                                "count" => 1
                            ],
                            [
                                "type" => "17",
                                "count" => 1
                            ]
                        ]
                    ],
                    [
                        "items" => [
                            [
                                "type" => "45",
                                "count" => 1
                            ],
                            [
                                "type" => "46",
                                "count" => 1
                            ],
                            [
                                "type" => "47",
                                "count" => 1
                            ]
                        ]
                    ],
                    [
                        "items" => [
                            [
                                "type" => "4",
                                "count" => 1
                            ]
                        ]
                    ],
                    [
                        "items" => [
                            [
                                "type" => "12",
                                "count" => 1
                            ]
                        ]
                    ]
                ]
            ],
            'money' => '5d4*10',
            'sub_klass_lvl' => 3,
            'abilities_spell' => 20 // Харизма для заклинаний
        ]);

        // 2. Добавляем подкласс
        $collegeOfValor = SubKlass::create([
            'name' => 'Коллегия доблести',
            'klass_id' => $bard->id
        ]);

        // 3. Привязываем навыки (abilities)
        $bardAbilities = Ability::whereIn('name', [
            'Атлетика',
            'Акробатика',
            'Ловкость рук',
            'Скрытность',
            'Магия',
            'История',
            'Расследование',
            'Природа',
            'Религия',
            'Обращение с животными',
            'Проницательность',
            'Медицина',
            'Восприятие',
            'Выживание',
            'Обман',
            'Запугивание',
            'Выступление',
            'Убеждение'
        ])->pluck('id');

        $bard->abilities()->sync($bardAbilities);

        // 4. Добавляем владения (proficiencies)
        $proficiencies = Proficiency::whereIn('name', [
            'Лёгкие доспехи',
            'Простое оружие',
            'Рапиры',
            'Длинные мечи',
            'Короткие мечи',
            'Ручные арбалеты',
            'Музыкальные инструменты'
        ])->pluck('id');

        $bard->proficiencies()->sync($proficiencies);

        // 5. Параметры уровня
        $bard->units()->createMany([
            [
                'name' => 'Известные заговоры',
                'lvl' => 1,
                'value' => 2,
                'is_resources' => false
            ],
            [
                'name' => 'Известные заклинания',
                'lvl' => 1,
                'value' => 4,
                'is_resources' => false
            ],
            [
                'name' => 'Ячейки заклинаний 1',
                'lvl' => 1,
                'value' => 2,
                'is_resources' => true,
                'reset_short_rest' => true
            ]
        ]);

        // 6. Умения класса
        $bard->skills()->create([
            'name' => 'Использование заклинаний',
            'description' => 'Вы научились изменять ткань реальности...',
            'lvl' => 1,
            'set_price' => true
        ]);

        // 7. Умения подкласса
        $collegeOfValor->skills()->create([
            'name' => 'Дополнительные навыки',
            'description' => 'Владение средними доспехами, щитами и воинским оружием',
            'lvl' => 3,
            'set_price' => false
        ]);
    }
}
