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
 * Class Benificiary
 *
 * @property string $uuid
 * @property string|null $full_name
 * @property int|null $number_of_visits
 * @property Carbon|null $birth_date
 * @property string|null $phone
 * @property Carbon|null $service_date
 * @property bool|null $home_care
 * @property string|null $purpose_of_visit
 * @property Carbon|null $date_received
 * @property bool|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $neighborhood_uuid
 * @property string $genre_uuid
 * @property string $provenace_uuid
 * @property string $reason_opening_case_uuid
 *
 * @property Genre $genre
 * @property Neighborhood $neighborhood
 * @property Provenace $provenace
 * @property ReasonOpeningCase $reason_opening_case
 * @property Collection|SpecifyThePropose[] $specify_the_proposes
 * @property Collection|SpecifyTheService[] $specify_the_services
 *
 * @package App\Models
 */
class Benificiary extends Model
{
	use SoftDeletes,Uuids;
	protected $table = 'benificiaries';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $casts = [
		'number_of_visits' => 'int',
		'home_care' => 'bool',
		'status' => 'bool'
	];

	protected $dates = [
		'birth_date',
		'service_date',
		'date_received'
	];

	protected $fillable = [
		'full_name',
		'number_of_visits',
		'birth_date',
		'phone',
		'service_date',
		'home_care',
		'purpose_of_visit',
		'date_received',
		'status',
		'neighborhood_uuid',
		'genre_uuid',
		'provenace_uuid',
		'reason_opening_case_uuid'
	];

	public function genre()
	{
		return $this->belongsTo(Genre::class, 'genre_uuid');
	}

	public function neighborhood()
	{
		return $this->belongsTo(Neighborhood::class, 'neighborhood_uuid');
	}

	public function provenace()
	{
		return $this->belongsTo(Provenace::class, 'provenace_uuid');
	}

	public function reason_opening_case()
	{
		return $this->belongsTo(ReasonOpeningCase::class, 'reason_opening_case_uuid');
	}

	public function specify_the_proposes()
	{
		return $this->hasMany(SpecifyThePropose::class, 'benificiary_uuid');
	}

	public function specify_the_services()
	{
		return $this->hasMany(SpecifyTheService::class, 'benificiary_uuid');
	}
}
