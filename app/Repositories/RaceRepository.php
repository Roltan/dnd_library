<?

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Race;
use App\Models\SubRace;

class RaceRepository
{
    public static function getRace(string $race): Race
    {
        $race = Race::query()
            ->where('name', $race)
            ->first();
        if ($race === null)
            throw new NotFoundException('Race not found');
        return $race;
    }

    public static function getSubRace(string $subRace, string $race = ''): SubRace
    {
        $subRace = SubRace::query()
            ->where('name', $subRace)
            ->first();
        if ($subRace === null)
            throw new NotFoundException('Sub race not found');
        if ($race != '' and $subRace->race->name != $race)
            throw new NotFoundException('Sub race not child for this race', 400);
        return $subRace;
    }
}
