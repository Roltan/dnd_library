<?php

namespace Database\Seeders\Background;

use App\Models\Background;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrchinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $urchin = Background::create([
            'name' => 'Беспризорник',
            'manual' => 'https://dnd.su/backgrounds/758-urchin/',
            'source' => "Player's Handbook",
            'equipment' => 'маленький_нож и карта_города и ручная_мышь и безделушка и комплект_обычной_одежды и 10зм',
            'skill_title' => 'Городские тайны',
            'skill_description' => 'Вы знаете тайные лазы и проходы городских улиц, позволяющие пройти там, где другие не увидят пути. Вне боя вы (и ведомые вами союзники) можете перемещаться по городу вдвое быстрее обычного.'
        ]);

        $urchin->abilities()->sync([5, 6]);

        $urchin->proficiencies()->sync([37, 99]);
    }
}
