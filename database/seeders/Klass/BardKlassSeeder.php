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
                    "items" => [
                        [
                            "type" => "Рапира",
                            "count" => 1
                        ],
                        [
                            "type" => "Длинный меч",
                            "count" => 1
                        ],
                        [
                            "type" => "Боевой посох",
                            "count" => 1
                        ],
                        [
                            "type" => "Булава",
                            "count" => 1
                        ],
                        [
                            "type" => "Дубинка",
                            "count" => 1
                        ],
                        [
                            "type" => "Кинжал",
                            "count" => 1
                        ],
                        [
                            "type" => "Копье",
                            "count" => 1
                        ],
                        [
                            "type" => "Лёгкий молот",
                            "count" => 1
                        ],
                        [
                            "type" => "Метательное копьё",
                            "count" => 1
                        ],
                        [
                            "type" => "Палица",
                            "count" => 1
                        ],
                        [
                            "type" => "Ручной топор",
                            "count" => 1
                        ],
                        [
                            "type" => "Серп",
                            "count" => 1
                        ],
                        [
                            "type" => "Лёгкий арбалет",
                            "count" => 1
                        ],
                        [
                            "type" => "Короткий лук",
                            "count" => 1
                        ],
                        [
                            "type" => "Праща",
                            "count" => 1
                        ]
                    ]
                ],
                [
                    "items" => [
                        [
                            "type" => "Набор артиста",
                            "count" => 1
                        ],
                        [
                            "type" => "Набор дипломата",
                            "count" => 1
                        ]
                    ]
                ],
                [
                    "items" => [
                        [
                            "type" => "Лютня",
                            "count" => 1
                        ],
                        [
                            "type" => "Флейта",
                            "count" => 1
                        ],
                        [
                            "type" => "Барабан",
                            "count" => 1
                        ]
                    ]
                ],
                [
                    "items" => [
                        [
                            "type" => "Кожаный доспех",
                            "count" => 1
                        ]
                    ]
                ],
                [
                    "items" => [
                        [
                            "type" => "Кинжал",
                            "count" => 1
                        ]
                    ]
                ]
            ],
            'money' => '5d4*10',
            'sub_klass_lvl' => 3,
            'abilities_spell' => 20
        ]);

        // 2. Привязываем навыки (abilities)
        $bardAbilities = Ability::all()->pluck('id')->toArray();
        $bard->abilities()->sync($bardAbilities);

        // 3. Добавляем владения (proficiencies)
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

        // 4. Параметры уровня
        $this->createUnits(
            values: [
                1 => 2,
                4 => 3,
                10 => 4
            ],
            stat: [
                'name' => 'Известные заговоры',
                'is_resources' => false
            ],
            klass: $bard
        );
        $this->createUnits(
            values: [
                1 => 4,
                2 => 5,
                3 => 6,
                4 => 7,
                5 => 8,
                6 => 9,
                7 => 10,
                8 => 11,
                9 => 12,
                10 => 14,
                11 => 15,
                12 => 15,
                13 => 16,
                14 => 18,
                15 => 19,
                16 => 19,
                17 => 20,
                18 => 22,
            ],
            stat: [
                'name' => 'Известные заклинания',
                'is_resources' => false
            ],
            klass: $bard);
        $this->createUnits(
            values: [
                1 => 2,
                2 => 3,
                3 => 4,
            ],
            stat: [
                'name' => 'Ячейки заклинаний 1',
                'is_resources' => true,
                'reset_short_rest' => false,
                'reset_initiative' => false
            ],
            klass: $bard
        );
        $this->createUnits(
            values: [
                1 => 0,
                3 => 2,
                4 => 3,
            ],
            stat: [
                'name' => 'Ячейки заклинаний 2',
                'is_resources' => true,
                'reset_short_rest' => false,
                'reset_initiative' => false
            ],
            klass: $bard
        );
        $this->createUnits(
            values: [
                1 => 0,
                5 => 2,
                6 => 3,
            ],
            stat: [
                'name' => 'Ячейки заклинаний 3',
                'is_resources' => true,
                'reset_short_rest' => false,
                'reset_initiative' => false
            ],
            klass: $bard
        );
        $this->createUnits(
            values: [
                1 => 0,
                7 => 1,
                8 => 2,
                9 => 3,
            ],
            stat: [
                'name' => 'Ячейки заклинаний 4',
                'is_resources' => true,
                'reset_short_rest' => false,
                'reset_initiative' => false
            ],
            klass: $bard
        );
        $this->createUnits(
            values: [
                1 => 0,
                9 => 1,
                10 => 2,
                18 => 3,
            ],
            stat: [
                'name' => 'Ячейки заклинаний 5',
                'is_resources' => true,
                'reset_short_rest' => false,
                'reset_initiative' => false
            ],
            klass: $bard
        );
        $this->createUnits(
            values: [
                1 => 0,
                11 => 1,
                19 => 2,
            ],
            stat: [
                'name' => 'Ячейки заклинаний 6',
                'is_resources' => true,
                'reset_short_rest' => false,
                'reset_initiative' => false
            ],
            klass: $bard
        );
        $this->createUnits(
            values: [
                1 => 0,
                13 => 1,
                20 => 2,
            ],
            stat: [
                'name' => 'Ячейки заклинаний 7',
                'is_resources' => true,
                'reset_short_rest' => false,
                'reset_initiative' => false
            ],
            klass: $bard
        );
        $this->createUnits(
            values: [
                1 => 0,
                15 => 1,
            ],
            stat: [
                'name' => 'Ячейки заклинаний 8',
                'is_resources' => true,
                'reset_short_rest' => false,
                'reset_initiative' => false
            ],
            klass: $bard
        );
        $this->createUnits(
            values: [
                1 => 0,
                17 => 1,
            ],
            stat: [
                'name' => 'Ячейки заклинаний 9',
                'is_resources' => true,
                'reset_short_rest' => false,
                'reset_initiative' => false
            ],
            klass: $bard
        );

        // 5. Умения класса
        $bard->skills()->create([
            'name' => 'Использование заклинаний',
            'description' => "Вы научились изменять ткань реальности в соответствии с вашими волей и музыкой. Ваши заклинания являются частью вашего обширного репертуара; это магия, которой вы найдёте применение в любой ситуации. Вы найдёте список заклинаний, доступных барду в этом разделе: заклинания барда. Так же правила по использованию заклинаний есть в этой статье: использование заклинаний.\n\nЗаговоры (заклинания 0-го уровня)\nВы знаете два заговора из списка доступных для барда на ваш выбор. При достижении более высоких уровней вы выучите новые, в соответствии с колонкой «известные заговоры».\n\nЯчейки заклинаний\nТаблица «Бард» показывает, сколько ячеек заклинаний у вас есть для заклинаний барда 1-го и других уровней. Для накладывания заклинания вы должны потратить ячейку соответствующего либо превышающего уровня. Вы восстанавливаете все потраченные ячейки в конце продолжительного отдыха. Например, если вы знаете заклинание 1-го уровня лечение ран [cure wounds], и у вас есть ячейки 1-го и 2-го уровней, вы можете наложить его с помощью любой из этих ячеек.\n\nИзвестные заклинания первого и более высоких уровней\nВы знаете четыре заклинания 1-го уровня на свой выбор из списка доступных барду.\n\nКолонка «известные заклинания» показывает, когда вы сможете выучить новые заклинания. Уровень заклинаний не должен превышать уровень самой высокой имеющейся у вас ячейки заклинаний. Например, когда вы достигнете 3-го уровня в этом классе, вы можете выучить одно новое заклинание 1-го или 2-го уровня.\n\nКроме того, когда вы получаете новый уровень в этом классе, вы можете одно из известных вам заклинаний барда заменить на другое из списка барда, уровень которого тоже должен соответствовать имеющимся ячейкам заклинаний.\n\nБазовая характеристика заклинаний\nПри накладывании заклинаний бард использует свою Харизму. Ваша магия проистекает из сердечности и душевности, которую вы вкладываете в исполнение музыки и произнесение речей. Вы используете Харизму в случаях, когда заклинание ссылается на базовую характеристику. Кроме того, вы используете Харизму при определении Сл спасбросков от ваших заклинаний, и при броске атаки заклинаниями.\n\nСл спасброска = 8 + ваш бонус мастерства + ваш модификатор Харизмы\nМодификатор броска атаки = ваш бонус мастерства + ваш модификатор Харизмы\n\nРитуальное колдовство\nВы можете сотворить любое известное вам заклинание барда в качестве ритуала, если заклинание позволяет это.\n\nФокусировка заклинания\nВы можете использовать музыкальный инструмент в качестве фокусировки для ваших заклинаний барда.",
            'lvl' => 1,
            'set_price' => true
        ]);

        // 6. Добавляем подкласс
        $collegeOfValor = SubKlass::create([
            'name' => 'Коллегия доблести',
            'klass_id' => $bard->id
        ]);

        // 7. Умения подкласса
        $collegeOfValor->skills()->create([
            'name' => 'Дополнительные навыки',
            'description' => 'Владение средними доспехами, щитами и воинским оружием',
            'lvl' => 3,
            'set_price' => false
        ]);
    }

    protected function createUnits(array $values, array $stat, Klass $klass): void
    {
        foreach ($values as $key => $value) {
            $data = $stat;
            $data['lvl'] = $key;
            $data['value'] = $value;

            $klass->units()->create($data);
        }
    }
}
