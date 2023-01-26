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
 * Class ReasonOpeningCase
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
 * @method static \Database\Factories\ReasonOpeningCaseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase newQuery()
 * @method static \Illuminate\Database\Query\Builder|ReasonOpeningCase onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereUlid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ReasonOpeningCase withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ReasonOpeningCase withoutTrashed()
 * @mixin \Eloquent
 */
class ReasonOpeningCase extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUlids;

    protected $table = 'reason_opening_cases';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class, 'reason_opening_case_ulid');
    }

    public function biosps(): MorphToMany
    {
        return $this->morphToMany(Biosp::class, 'biospable');
    }
}
