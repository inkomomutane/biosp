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
 * App\Models\Provenace
 *
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name
 * @property-read Collection<int, \App\Models\Benificiary> $benificiaries
 * @property-read int|null $benificiaries_count
 * @method static \Database\Factories\ProvenaceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Provenace withoutTrashed()
 * @mixin \Eloquent
 */
class Provenace extends Model
{
    use Uuids,HasFactory,SoftDeletes;
	protected $table = 'provenaces';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function benificiaries()
	{
		return $this->hasMany(Benificiary::class, 'provenace_uuid');
	}
}
