<?

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Klass;
use App\Models\SubKlass;

class KlassRepository
{
    public static function getKlass(string $klass): Klass
    {
        $klass = Klass::query()
            ->where('name', $klass)
            ->first();
        if ($klass === null)
            throw new NotFoundException('klass not found');
        return $klass;
    }

    public static function getSubKlass(string $subKlass, string $klass = ''): SubKlass
    {
        $sub = SubKlass::query()
            ->where('name', $subKlass)
            ->first();
        if ($sub === null)
            throw new NotFoundException('Sub klass not found');

        if ($klass != '' and $sub->klass->name != $klass)
            throw new NotFoundException('Sub klass not child for this klass', 400);

        return $sub;
    }

    public static function getAvailableSpells(string $klass, string $subKlass = '', int $lvl = 1): array
    {
        $klass = self::getKlass($klass);
        $subKlass = $subKlass == '' ?
            null :
            self::getSubKlass($subKlass, $klass);

        if (!$klass->spells()->exists() and !$subKlass?->spells()->exists())
            return [];

        $charUnit = $klass->unit()
            ->where('lvl', $lvl)
            ->where('name', 'like', '%Ячейки заклинаний%')
            ->get()
            ->pluck('name')
            ->toArray();

        $spell = [];
        foreach ($charUnit as $unit) {
            $charLvl = filter_var($unit, FILTER_SANITIZE_NUMBER_INT);
            $spell += $klass->spell()
                ->where('lvl', $charLvl)
                ->get()
                ->pluck('id')
                ->toArray();
            $spell += $subKlass?->spell()
                ->where('lvl', $charLvl)
                ->get()
                ->pluck('id')
                ->toArray();
        }

        return $spell;
    }
}
