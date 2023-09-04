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
 * App\Models\ForwardedService
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $uuid
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Collection<int, \App\Models\Benificiary> $benificiaries
 * @property-read int|null $benificiaries_count
 * @method static \Database\Factories\ForwardedServiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ForwardedService withoutTrashed()
 * @mixin \Eloquent
 */
class ForwardedService extends Model
{
    use Uuids,HasFactory,SoftDeletes;
	protected $table = 'forwarded_services';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function benificiaries()
	{
		return $this->hasMany(Benificiary::class, 'forwarded_service_uuid');
	}
}
