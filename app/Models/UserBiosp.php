<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 *
 * @method static Builder|UserBiosp newModelQuery()
 * @method static Builder|UserBiosp newQuery()
 * @method static Builder|UserBiosp query()
 * @method static Builder|UserBiosp whereBiospUlid($value)
 * @method static Builder|UserBiosp whereUserUlid($value)
 *
 * @mixin \Eloquent
 */
class UserBiosp extends Model
{
    protected $table = 'user_biosps';

    protected $fillable = [
        'user_ulid',
        'biosp_ulid',
    ];

    public function biosp(): BelongsTo
    {
        return $this->belongsTo(Biosp::class, 'biosp_ulid');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_ulid');
    }
}
