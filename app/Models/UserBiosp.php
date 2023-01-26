<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserBiosp
 *
 * @property string $ulid
 * @property string $user_ulid
 * @property string $biosp_ulid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Biosp $biosp
 * @property User $user
 */
class UserBiosp extends Model
{
    use HasUlids;

    protected $table = 'user_biosps';

    public $incrementing = false;

    protected $fillable = [
        'user_ulid',
        'biosp_ulid',
    ];

    public function biosp()
    {
        return $this->belongsTo(Biosp::class, 'biosp_ulid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ulid');
    }
}
