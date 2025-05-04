<?

namespace App\Repositories;

use App\Models\Ability;

class AbilityRepository
{
    public static function getNameById(int|array $id): array|string
    {
        return is_array($id) ?
            Ability::query()
            ->whereIn('id', $id)
            ->get()
            ->pluck('name')
            ->toArray() :
            Ability::query()
            ->find($id)
            ->name;
    }
}
