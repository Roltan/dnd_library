<?php

namespace Database\Seeders\Feats;

use App\Models\Feat;
use Illuminate\Database\Seeder;

class DuelistFeatsSeeder extends Seeder
{
    private $feat;

    public function run()
    {
        $this->feat = Feat::create([
            'name' => 'Оборонительный дуэлянт',
            'manual' => 'https://dnd.su/feats/129-defensive-duelist/',
            'source' => 'Player`s handbook',
            'condition' => [
                [
                    "bonus" => "13",
                    "abilities" => "Ловкость"
                ]
            ],
//            'name_resource' => null,
//            'value_resource' => null,
//            'reset_short_rest' => null,
//            'reset_initiative' => null
        ]);

        $this->skills([
            'Если вы используете оружие со свойством «фехтовальное», которым владеете, и другое существо попадает по вам рукопашной атакой, вы можете для этой атаки реакцией добавить бонус мастерства к КД, что потенциально может привести к промаху атаки.',
        ]);
    }

    public function skills($arr)
    {
        foreach ($arr as $description) {
            $this->feat->skills()->create([
                'name' => $this->feat->name,
                'description' => $description,
                'lvl' => 1
            ]);
        }
    }
}
