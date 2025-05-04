<?

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

class SkillRepository
{
    public static function getManyInfo(array $ids): Collection
    {
        $skill = Skill::query()
            ->whereIn('id', $ids)
            ->get();

        if ($skill->count() != count($ids)) {
            $existingIds = $skill->pluck('id')->toArray();
            $missingIds = array_diff($ids, $existingIds);

            throw new NotFoundException('Not all id`s were found', arr: ['missing_ids' => array_values($missingIds)]);
        }
        return $skill;
    }
}
