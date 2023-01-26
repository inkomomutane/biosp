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
 * Class neighborhoods
 *
 * @property string|null $deleted_at
 * @property string $ulid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $province_ulid
 * @property Province|null $province
 * @property Collection|Biosp[] $biosps
 */
class Neighborhood extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUlids;

    protected $table = 'neighborhoods';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'province_ulid',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_ulid');
    }

    public function biosps(): HasMany
    {
        return $this->hasMany(Biosp::class, 'neighborhood_ulid');
    }
}
