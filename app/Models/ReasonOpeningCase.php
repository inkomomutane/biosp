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
 * App\Models\ReasonOpeningCase
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $uuid
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Collection<int, \App\Models\Benificiary> $benificiaries
 * @property-read int|null $benificiaries_count
 * @method static \Database\Factories\ReasonOpeningCaseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ReasonOpeningCase withoutTrashed()
 * @mixin \Eloquent
 */
class ReasonOpeningCase extends Model
{
	use Uuids,HasFactory,SoftDeletes;
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
