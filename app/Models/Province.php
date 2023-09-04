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
 * App\Models\Province
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name
 * @property-read Collection<int, \App\Models\Neighborhood> $neighborhoods
 * @property-read int|null $neighborhoods_count
 * @method static \Database\Factories\ProvinceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Province withoutTrashed()
 * @mixin \Eloquent
 */
class Province extends Model
{
	use Uuids,HasFactory,SoftDeletes;
	protected $table = 'provinces';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function neighborhoods()
	{
		return $this->hasMany(Neighborhood::class, 'province_uuid');
	}
}
