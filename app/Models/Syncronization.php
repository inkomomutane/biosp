<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Syncronization
 *
 * @property Carbon|null $last_sync_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id
 * @property string $user_ulid
 * @property bool|null $complete
 */
class Syncronization extends Model
{
    use HasFactory;

    protected $table = 'syncronizations';

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
