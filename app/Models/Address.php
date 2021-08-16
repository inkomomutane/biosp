<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property int $provinces_id
 * 
 * @property Province $province
 *
 * @package App\Models
 */
class Address extends Model
{
	protected $table = 'addresses';

	protected $casts = [
		'provinces_id' => 'int'
	];

	protected $fillable = [
		'name',
		'provinces_id'
	];

	public function province()
	{
		return $this->belongsTo(Province::class, 'provinces_id');
	}
}
