<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserBiosp
 *
 * @property string $uuid
 * @property string $user_uuid
 * @property string $biosp_uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Biosp $biosp
 * @property User $user
 */
class UserBiosp extends Model
{
    use HasUuids;

    protected $table = 'user_biosps';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'user_uuid',
        'biosp_uuid',
    ];

    public function biosp()
    {
        return $this->belongsTo(Biosp::class, 'biosp_uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid');
    }
}
