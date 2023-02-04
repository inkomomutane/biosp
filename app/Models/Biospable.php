<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BiospServico
 *
 * @property string $ulid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $biospable_type
 * @property string|null $biospable_ulid
 * @property string|null $biosp_ulid
 * @property string $biospable_id
 *
 * @method static Builder|Biospable newModelQuery()
 * @method static Builder|Biospable newQuery()
 * @method static Builder|Biospable query()
 * @method static Builder|Biospable whereBiospUlid($value)
 * @method static Builder|Biospable whereBiospableId($value)
 * @method static Builder|Biospable whereBiospableType($value)
 *
 * @mixin \Eloquent
 */
class Biospable extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'biospables';

    protected $fillable = [
        'biospable_type',
        'biospable_ulid',
        'biosp_ulid',
    ];
}
