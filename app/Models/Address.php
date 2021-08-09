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
 *
 * @package App\Models
 */
class Address extends Model
{
	protected $table = 'addresses';

	protected $fillable = [
		'name'
	];

	public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
