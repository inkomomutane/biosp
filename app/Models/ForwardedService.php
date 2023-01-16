<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ForwardedService
 *
 * @property string|null $deleted_at
 * @property string $uuid
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Beneficiary[] $beneficiaries
 */
class ForwardedService extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUuids;

    protected $table = 'forwarded_services';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class, 'forwarded_service_uuid');
    }

    public function biosps(): MorphToMany
    {
        return $this->morphToMany(Biosp::class,'biospable');
    }
}
