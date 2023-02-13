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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ForwardedService
 *
 * @property string|null $deleted_at
 * @property string $ulid
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Beneficiary[] $beneficiaries
 * @property-read int|null $beneficiaries_count
 * @property-read Collection|\App\Models\Biosp[] $biosps
 * @property-read int|null $biosps_count
 *
 * @method static \Database\Factories\ForwardedServiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService newQuery()
 * @method static \Illuminate\Database\Query\Builder|ForwardedService onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereUlid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ForwardedService withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ForwardedService withoutTrashed()
 *
 * @mixin \Eloquent
 */
class ForwardedService extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUlids;

    protected $table = 'forwarded_services';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class, 'forwarded_service_ulid');
    }

    public function biosps(): MorphToMany
    {
        return $this->morphToMany(Biosp::class, 'biospable');
    }
}
