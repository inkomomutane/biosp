<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Biospdatabase
 * 
 * @property string $uuid
 * @property string|null $full_name
 * @property int|null $number_of_visits
 * @property Carbon|null $birth_date
 * @property string|null $phone
 * @property Carbon|null $service_date
 * @property string|null $professional_qualification
 * @property string|null $specify_service
 * @property bool|null $home_care
 * @property string|null $purpose_of_visit
 * @property Carbon|null $date_received
 * @property bool|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $genre_id
 * @property int $province_id
 * @property int $reason_opening_case_id
 * @property int $document_type_id
 * @property int $forwarded_service_id
 * @property int $purpose_of_visit_id
 * 
 * @property DocumentType $document_type
 * @property ForwardedService $forwarded_service
 * @property Genre $genre
 * @property Province $province
 * @property ReasonOpeningCase $reason_opening_case
 *
 * @package App\Models
 */
class Biospdatabase extends Model
{
	protected $table = 'biospdatabases';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $casts = [
		'number_of_visits' => 'int',
		'home_care' => 'bool',
		'status' => 'bool',
		'genre_id' => 'int',
		'province_id' => 'int',
		'reason_opening_case_id' => 'int',
		'document_type_id' => 'int',
		'forwarded_service_id' => 'int',
		'purpose_of_visit_id' => 'int'
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
		'professional_qualification',
		'specify_service',
		'home_care',
		'purpose_of_visit',
		'date_received',
		'status',
		'genre_id',
		'province_id',
		'reason_opening_case_id',
		'document_type_id',
		'forwarded_service_id',
		'purpose_of_visit_id'
	];

	public function document_type()
	{
		return $this->belongsTo(DocumentType::class);
	}

	public function forwarded_service()
	{
		return $this->belongsTo(ForwardedService::class);
	}

	public function genre()
	{
		return $this->belongsTo(Genre::class);
	}

	public function province()
	{
		return $this->belongsTo(Province::class);
	}

	public function purpose_of_visit()
	{
		return $this->belongsTo(PurposeOfVisit::class);
	}

	public function reason_opening_case()
	{
		return $this->belongsTo(ReasonOpeningCase::class);
	}
}
