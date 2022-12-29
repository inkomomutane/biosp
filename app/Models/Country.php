<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 *
 * @property string|null $deleted_at
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property Collection|Province[] $provinces
 */
class Country extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Uuids;

    protected $table = 'countries';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class, 'country_uuid');
    }
}
