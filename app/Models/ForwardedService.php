<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ForwardedService
 *
 * @property string|null $deleted_at
 * @property string $uuid
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|SpecifyTheService[] $specify_the_services
 *
 * @package App\Models
 */
class ForwardedService extends Model
{
	use SoftDeletes,Uuids;
	protected $table = 'forwarded_services';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function specify_the_services()
	{
		return $this->hasMany(SpecifyTheService::class, 'forwarded_service_uuid');
	}
}
