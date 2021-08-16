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
 * @property string|null $uuid
 * @property Carbon|null $sync_time
 *
 * @package App\Models
 */
class Synchronization extends Model
{
	protected $table = 'synchronizations';
	public $timestamps = false;

	protected $dates = [
		'sync_time'
	];

	protected $fillable = [
		'uuid',
		'sync_time'
	];



}
