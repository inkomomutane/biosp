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
 * Class ReasonOpeningCase
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
class ReasonOpeningCase extends Model
{
	use SoftDeletes,Uuids,HasFactory;
	protected $table = 'reason_opening_cases';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function benificiaries()
	{
		return $this->hasMany(Benificiary::class, 'reason_opening_case_uuid');
	}
}
