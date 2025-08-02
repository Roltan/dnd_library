<?php

namespace Database\Seeders\Background;

use App\Models\Background;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntertainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entertainer = Background::create([
            'name' => 'Артист',
            'manual' => 'https://dnd.su/backgrounds/757-entertainer/',
            'source' => "Player's Handbook",
            'equipment' => '# Музыкальные_инструменты и подарок_от_поклонницы и костюм и 15зм',
            'skill_title' => 'По многочисленным просьбам',
            'skill_description' => 'Вы всегда можете найти место для выступления. Обычно это таверна или постоялый двор, но это может быть цирк, театр или даже двор знатного господина. В этом месте вы получаете бесплатный постой и еду по скромным или комфортным стандартам (в зависимости от качества заведения), если вы выступаете каждый вечер. Кроме того, ваши выступления делают вас местной знаменитостью. Когда посторонние узнают вас в городе, в котором вы давали представление, они, скорее всего, будут к вам относиться хорошо.'
        ]);

        $entertainer->abilities()->sync([4, 23]);

        $entertainer->proficiencies()->sync([99, 119]);
    }
}
