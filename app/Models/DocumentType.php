<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DocumentType
 *
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string $uuid
 * @property Collection|Benificiary[] $benificiaries
 */
class DocumentType extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Uuids;

    protected $table = 'document_types';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function benificiaries(): HasMany
    {
        return $this->hasMany(Benificiary::class, 'document_type_uuid');
    }
}
