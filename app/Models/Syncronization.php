<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Syncronization
 *
 * @property \Illuminate\Support\Carbon|null $last_sync_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $id
 * @property string $user_uuid
 * @property bool|null $complete
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\SyncronizationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Syncronization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Syncronization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Syncronization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Syncronization whereComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Syncronization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Syncronization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Syncronization whereLastSyncAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Syncronization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Syncronization whereUserUuid($value)
 * @mixin \Eloquent
 */
class Syncronization extends Model
{
    use HasFactory;
	protected $table = 'syncronizations';

	protected $casts = [
		'complete' => 'bool'
	];

	protected $dates = [
		'last_sync_at'
	];

	protected $fillable = [
		'last_sync_at',
		'user_uuid',
		'complete'
	];

    public function user()
    {
        return $this->belongsTo(User::class,'user_uuid');
    }
}
