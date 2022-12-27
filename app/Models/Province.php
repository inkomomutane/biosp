<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Province
 *
 * @property string|null $deleted_at
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string $country_uuid
 *
 * @property Country $country
 * @property Collection|Neighborhood[] $neighborhoods
 *
 * @package App\Models
 */
class Province extends Model
{
	use SoftDeletes;
    use HasFactory;

	protected $table = 'provinces';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'country_uuid'
	];

	public function country() : BelongsTo
	{
		return $this->belongsTo(Country::class, 'country_uuid');
	}

	public function neighborhoods() : HasMany
	{
		return $this->hasMany(Neighborhood::class, 'province_uuid');
	}
}
