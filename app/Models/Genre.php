<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Genre
 *
 * @property string $uuid
 * @property string|null $deleted_at
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Benificiary[] $benificiaries
 *
 * @package App\Models
 */
class Genre extends Model
{
	use SoftDeletes;
    use HasFactory;
    use Uuids;


	protected $table = 'genres';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function benificiaries() : HasMany
	{
		return $this->hasMany(Benificiary::class, 'genre_uuid');
	}
}
