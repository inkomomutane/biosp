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
 * Class Neighborhood
 *
 * @property string|null $deleted_at
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $province_uuid
 *
 * @property Province|null $province
 * @property Collection|Biosp[] $biosps
 *
 * @package App\Models
 */
class Neighborhood extends Model
{
	use SoftDeletes;
    use HasFactory;

	protected $table = 'neighborhoods';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'province_uuid'
	];

	public function province() : BelongsTo
	{
		return $this->belongsTo(Province::class, 'province_uuid');
	}

	public function biosps() : HasMany
	{
		return $this->hasMany(Biosp::class, 'neighborhood_uuid');
	}
}
