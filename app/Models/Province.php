<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Province
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * 
 * @property Collection|Address[] $addresses
 * @property Collection|Biospdatabase[] $biospdatabases
 *
 * @package App\Models
 */
class Province extends Model
{
	protected $table = 'provinces';

	protected $fillable = [
		'name'
	];

	public function addresses()
	{
		return $this->hasMany(Address::class, 'provinces_id');
	}

	public function biospdatabases()
	{
		return $this->hasMany(Biospdatabase::class);
	}
}
