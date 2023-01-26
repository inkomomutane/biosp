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
 * Class Provenance
 *
 * @property string $ulid
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property Collection|Beneficiary[] $beneficiaries
 * @property-read int|null $beneficiaries_count
 * @property-read Collection|\App\Models\Biosp[] $biosps
 * @property-read int|null $biosps_count
 * @method static \Database\Factories\ProvenanceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provenance newQuery()
 * @method static \Illuminate\Database\Query\Builder|Provenance onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Provenance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provenance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenance whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenance whereUlid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Provenance withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Provenance withoutTrashed()
 * @mixin \Eloquent
 */
class Provenance extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUlids;

    protected $table = 'provenances';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class, 'provenance_ulid');
    }

    public function biosps(): MorphToMany
    {
        return $this->morphToMany(Biosp::class, 'biospable');
    }
}
