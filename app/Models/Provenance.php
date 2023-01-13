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
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provenance
 *
 * @property string $uuid
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property Collection|Beneficiary[] $beneficiaries
 */
class Provenance extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUuids;

    protected $table = 'provenances';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class, 'provenance_uuid');
    }
}
