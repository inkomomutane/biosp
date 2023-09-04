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
 * App\Models\PurposeOfVisit
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name
 * @property-read Collection<int, \App\Models\Benificiary> $benificiaries
 * @property-read int|null $benificiaries_count
 * @method static \Database\Factories\PurposeOfVisitFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PurposeOfVisit withoutTrashed()
 * @mixin \Eloquent
 */
class PurposeOfVisit extends Model
{
    use Uuids,HasFactory,SoftDeletes;
	protected $table = 'purpose_of_visits';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function benificiaries()
	{
		return $this->hasMany(Benificiary::class, 'purpose_of_visit_uuid');
	}
}
