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
 * Class Genre
 *
 * @property string $ulid
 * @property string|null $deleted_at
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Beneficiary[] $beneficiaries
 * @property-read int|null $beneficiaries_count
 * @property-read Collection|\App\Models\Biosp[] $biosps
 * @property-read int|null $biosps_count
 * @method static \Database\Factories\GenreFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newQuery()
 * @method static \Illuminate\Database\Query\Builder|Genre onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereUlid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Genre withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Genre withoutTrashed()
 * @mixin \Eloquent
 */
class Genre extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUlids;

    protected $table = 'genres';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class, 'genre_ulid');
    }

    public function biosps(): MorphToMany
    {
        return $this->morphToMany(Biosp::class, 'biospable');
    }
}
