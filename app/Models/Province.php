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
 * @property-read int|null $neighborhoods_count
 *
 * @method static \Database\Factories\ProvinceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Query\Builder|Province onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCountryUlid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUlid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Province withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Province withoutTrashed()
 *
 * @mixin \Eloquent
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
