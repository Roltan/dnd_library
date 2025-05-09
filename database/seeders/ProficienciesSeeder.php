<?php

namespace Database\Seeders;

use App\Models\Proficiency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProficienciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            // Типы оружия (группы владения)
            'Простое оружие',
            'Воинское оружие',
            'Экзотическое оружие',

            // Типы брони
            'Лёгкие доспехи',
            'Средние доспехи',
            'Тяжёлые доспехи',
            'Щиты',

            // Стандартные языки
            'Общий язык',
            'Дварфский язык',
            'Эльфийский язык',
            'Гномий язык',
            'Орчий язык',
            'Халдейский язык',
            'Гоблинский язык',
            'Полуросликов язык',
            'Гигантский язык',
            'Подземный язык',

            // Экзотические языки
            'Драконий язык',
            'Глубинная речь',
            'Небесный язык',
            'Инфернальный язык',
            'Сильван язык',
            'Друидский язык',
            'Акван язык',
            'Игнан язык',
            'Терран язык',
            'Ауран язык',
            'Бездны язык',
            'Целистий язык',

            // Редкие и специальные
            'Вампирские руны',
            'Язык жестов',
            'Код воровской гильдии',
            'Шифр магов',
            'Телепатическая связь (не вербальный)',

            // Инструменты и ремесла
            'Музыкальные инструменты',
            'Ремесленные инструменты',
            'Воровские инструменты',
            'Алхимические принадлежности',
            'Травнические принадлежности',

            // Магические умения
            'Священные символы',
            'Магические фокусы',
            'Друидские фокусы',

            // Специфические классовые умения
            'Дикарское оружие',
            'Монашеское оружие',
            'Снаряжение следопыта'
        ];

        foreach ($array as $value)
            Proficiency::create([
                'name' => $value,
            ]);
    }
}
