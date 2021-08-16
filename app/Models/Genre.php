<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genre
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Biospdatabase[] $biospdatabases
 *
 * @package App\Models
 */
class Genre extends Model
{
	protected $table = 'genres';

	protected $fillable = [
		'name'
	];

	public function biospdatabases()
	{
		return $this->hasMany(Biospdatabase::class);
	}
}
