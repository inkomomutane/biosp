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
 * Class PurposeOfVisit
 *
 * @property string|null $deleted_at
 * @property string $ulid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property Collection|Beneficiary[] $beneficiaries
 * @property-read int|null $beneficiaries_count
 * @property-read Collection|\App\Models\Biosp[] $biosps
 * @property-read int|null $biosps_count
 *
 * @method static \Database\Factories\PurposeOfVisitFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit newQuery()
 * @method static \Illuminate\Database\Query\Builder|PurposeOfVisit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereUlid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PurposeOfVisit withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PurposeOfVisit withoutTrashed()
 *
 * @mixin \Eloquent
 */
class PurposeOfVisit extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUlids;

    protected $table = 'purpose_of_visits';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class, 'purpose_of_visit_ulid');
    }

    public function biosps(): MorphToMany
    {
        return $this->morphToMany(Biosp::class, 'biospable');
    }
}
