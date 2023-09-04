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
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Neighborhood
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $province_uuid
 * @property-read Collection<int, \App\Models\Benificiary> $benificiaries
 * @property-read int|null $benificiaries_count
 * @property-read \App\Models\Province|null $province
 * @property-read Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\NeighborhoodFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood query()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereProvinceUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood withoutTrashed()
 * @mixin \Eloquent
 */
class Neighborhood extends Model
{	use Uuids,HasFactory,SoftDeletes;
	protected $table = 'neighborhoods';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'province_uuid'
	];

	public function province()
	{
		return $this->belongsTo(Province::class, 'province_uuid');
	}

	public function benificiaries()
	{
		return $this->hasMany(Benificiary::class, 'neighborhood_uuid');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'neighborhood_uuid');
	}
}
