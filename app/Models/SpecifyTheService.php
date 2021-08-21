<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SpecifyTheService
 *
 * @property string $benificiary_uuid
 * @property string $forwarded_service_uuid
 * @property string|null $specify_the_service
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $uuid
 *
 * @property Benificiary $benificiary
 * @property ForwardedService $forwarded_service
 *
 * @package App\Models
 */
class SpecifyTheService extends Model
{
    use Uuids;
	protected $table = 'specify_the_services';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'benificiary_uuid',
		'forwarded_service_uuid',
		'specify_the_service'
	];

	public function benificiary()
	{
		return $this->belongsTo(Benificiary::class, 'benificiary_uuid');
	}

	public function forwarded_service()
	{
		return $this->belongsTo(ForwardedService::class, 'forwarded_service_uuid');
	}
}
