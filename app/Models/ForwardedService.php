<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
 * @property Collection|Benificiary[] $benificiaries
 *
 * @package App\Models
 */
class ForwardedService extends Model
{
	use SoftDeletes;
    use HasFactory;

	protected $table = 'forwarded_services';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function benificiaries() : HasMany
	{
		return $this->hasMany(Benificiary::class, 'forwarded_service_uuid');
	}
}
