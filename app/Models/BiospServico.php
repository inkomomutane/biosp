<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BiospServico
 *
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $model_type
 * @property string|null $model_id
 * @property string|null $table
 */
class BiospServico extends Model
{
    use HasFactory;
    use Uuids;

    protected $table = 'biosp_servicos';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'model_type',
        'model_id',
        'table',
    ];
}