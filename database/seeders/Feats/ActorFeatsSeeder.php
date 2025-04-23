<?php

namespace Database\Seeders\Feats;

use App\Models\Feat;
use Illuminate\Database\Seeder;

class ActorFeatsSeeder extends Seeder
{
    private $feat;

    public function run()
    {
        $this->feat = Feat::create([
            'name' => 'Артистичный',
            'manual' => 'https://dnd.su/feats/101-actor/',
            'source' => 'Player`s handbook',
//            'condition' => null,
//            'name_resource' => null,
//            'value_resource' => null,
//            'reset_short_rest' => null,
//            'reset_initiative' => null
        ]);

        $this->skills([
            'Увеличьте значение Харизмы на 1 при максимуме 20',
            'Вы совершаете с преимуществом проверки Харизмы (Выступление) и Харизма (Обман), когда пытаетесь выдать себя за кого-то другого',
            'Вы можете подражать речи кого-то другого, а также звукам, издаваемым другими существами. Перед этим вы должны как минимум в течение 1 минуты слышать чужую речь или звуки существа. Успешная проверка Мудрости (Проницательность), противопоставленная вашей проверке Харизмы (Обман), позволяет слушающему понять, что источник звука не настоящий'
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
