<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @property Carbon|null $date_received
 * @property bool|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $6
 * @property string|null $other_document_type
 * @property string|null $other_reason_opening_case
 * @property string|null $other_forwarded_service
 * @property string|null $specify_purpose_of_visit
 * @property string|null $visit_proposes
 * @property string|null $genre_uuid
 * @property string|null $provenace_uuid
 * @property string|null $reason_opening_case_uuid
 * @property string|null $document_type_uuid
 * @property string|null $forwarded_service_uuid
 * @property string|null $purpose_of_visit_uuid
 *
 * @property DocumentType|null $document_type
 * @property ForwardedService|null $forwarded_service
 * @property PurposeOfVisit|null $purpose_of_visit
 * @property Genre|null $genre
 * @property Provenace|null $provenace
 * @property ReasonOpeningCase|null $reason_opening_case
 *
 * @package App\Models
 */
class Benificiary extends Model
{
    use HasFactory;
    use Uuids;

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
		'date_received',
		'6'
	];

	protected $fillable = [
		'full_name',
		'number_of_visits',
		'birth_date',
		'phone',
		'service_date',
		'home_care',
		'date_received',
		'status',
		'6',
		'other_document_type',
		'other_reason_opening_case',
		'other_forwarded_service',
		'specify_purpose_of_visit',
		'visit_proposes',
		'genre_uuid',
		'provenace_uuid',
		'reason_opening_case_uuid',
		'document_type_uuid',
		'forwarded_service_uuid',
		'purpose_of_visit_uuid'
	];

	public function document_type() : BelongsTo
	{
		return $this->belongsTo(DocumentType::class, 'document_type_uuid');
	}

	public function forwarded_service() : BelongsTo
	{
		return $this->belongsTo(ForwardedService::class, 'forwarded_service_uuid');
	}

	public function purpose_of_visit() : BelongsTo
	{
		return $this->belongsTo(PurposeOfVisit::class, 'purpose_of_visit_uuid');
	}

	public function genre() : BelongsTo
	{
		return $this->belongsTo(Genre::class, 'genre_uuid');
	}

	public function provenace() : BelongsTo
	{
		return $this->belongsTo(Provenace::class, 'provenace_uuid');
	}

	public function reason_opening_case() : BelongsTo
	{
		return $this->belongsTo(ReasonOpeningCase::class, 'reason_opening_case_uuid');
	}
}
