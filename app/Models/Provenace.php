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
use Spatie\Translatable\HasTranslations;

/**
 * Class Provenace
 *
 * @property string $uuid
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property Collection|Benificiary[] $benificiaries
 */
class Provenace extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUuids;
    use HasTranslations;


    protected $table = 'provenaces';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    public array $translatable = ['name'];
    protected $fillable = [
        'name',
    ];

    public function benificiaries(): HasMany
    {
        return $this->hasMany(Benificiary::class, 'provenace_uuid');
    }
}
