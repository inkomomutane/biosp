<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Province
 *
 * @property string|null $deleted_at
 * @property string $ulid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string $country_ulid
 * @property Country $country
 * @property Collection|Neighborhood[] $neighborhoods
 */
class Province extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUlids;

    protected $table = 'provinces';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'country_ulid',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_ulid');
    }

    public function neighborhoods(): HasMany
    {
        return $this->hasMany(Neighborhood::class, 'province_ulid');
    }
}
