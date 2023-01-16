<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BiospServico
 *
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $biospable_type
 * @property string|null $biospable_uuid
 * @property string|null $biosp_uuid
 */
class Biospable extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'biospables';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'biospable_type',
        'biospable_uuid',
        'biosp_uuid',
    ];
}
