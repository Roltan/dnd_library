<?

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Spell;
use Illuminate\Database\Eloquent\Collection;

class SpellRepository
{
    public static function getManyInfo(array $ids): Collection
    {
        $spell = Spell::query()
            ->whereIn('id', $ids)
            ->get();

        if ($spell->count() != count($ids)) {
            $existingIds = $spell->pluck('id')->toArray();
            $missingIds = array_diff($ids, $existingIds);

            throw new NotFoundException('Not all id`s were found', arr: ['missing_ids' => array_values($missingIds)]);
        }
        return $spell;
    }
}
