<?

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Background;
use App\Models\SubKlass;

class BackgroundRepository
{
    public static function getBackground(string $background): Background
    {
        $el = Background::query()
            ->where('name', $background)
            ->first();
        if ($el === null)
            throw new NotFoundException('background not found');
        return $el;
    }
}
