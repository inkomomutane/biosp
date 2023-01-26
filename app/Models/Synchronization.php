<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\SynchronizationFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Synchronization
 *
 * @property Carbon|null $last_sync_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id
 * @property string $user_ulid
 * @property bool|null $complete
 * @method static SynchronizationFactory factory(...$parameters)
 * @method static Builder|Synchronization newModelQuery()
 * @method static Builder|Synchronization newQuery()
 * @method static Builder|Synchronization query()
 * @method static Builder|Synchronization whereComplete($value)
 * @method static Builder|Synchronization whereCreatedAt($value)
 * @method static Builder|Synchronization whereId($value)
 * @method static Builder|Synchronization whereLastSyncAt($value)
 * @method static Builder|Synchronization whereUpdatedAt($value)
 * @method static Builder|Synchronization whereUserUlid($value)
 * @mixin Eloquent
 */
class Synchronization extends Model
{
    use HasFactory;

    protected $table = 'synchronizations';

    protected $casts = [
        'complete' => 'bool',
    ];

    protected $dates = [
        'last_sync_at',
    ];

    protected $fillable = [
        'last_sync_at',
        'user_ulid',
        'complete',
    ];
}
