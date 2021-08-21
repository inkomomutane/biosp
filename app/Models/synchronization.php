<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Synchronization
 * 
 * @property int $id
 * @property string $uuid
 * @property Carbon|null $last_sync_time
 *
 * @package App\Models
 */
class Synchronization extends Model
{
	protected $table = 'synchronization';
	public $timestamps = false;

	protected $dates = [
		'last_sync_time'
	];

	protected $fillable = [
		'uuid',
		'last_sync_time'
	];
}
