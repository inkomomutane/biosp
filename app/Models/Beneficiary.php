<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\BeneficiaryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Beneficiary
 *
 * @property string $ulid
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
 * @property string|null $genre_ulid
 * @property string|null $provenance_ulid
 * @property string|null $reason_opening_case_ulid
 * @property string|null $document_type_ulid
 * @property string|null $forwarded_service_ulid
 * @property string|null $purpose_of_visit_ulid
 * @property DocumentType|null $document_type
 * @property ForwardedService|null $forwarded_service
 * @property PurposeOfVisit|null $purpose_of_visit
 * @property Genre|null $genre
 * @property Provenance|null $provenance
 * @property ReasonOpeningCase|null $reason_opening_case
 * @property string|null $biosp_ulid
 *
 * @method static BeneficiaryFactory factory(...$parameters)
 * @method static Builder|Beneficiary newModelQuery()
 * @method static Builder|Beneficiary newQuery()
 * @method static Builder|Beneficiary query()
 * @method static Builder|Beneficiary whereBiospUlid($value)
 * @method static Builder|Beneficiary whereBirthDate($value)
 * @method static Builder|Beneficiary whereCreatedAt($value)
 * @method static Builder|Beneficiary whereDateReceived($value)
 * @method static Builder|Beneficiary whereDocumentTypeUlid($value)
 * @method static Builder|Beneficiary whereForwardedServiceUlid($value)
 * @method static Builder|Beneficiary whereFullName($value)
 * @method static Builder|Beneficiary whereGenreUlid($value)
 * @method static Builder|Beneficiary whereHomeCare($value)
 * @method static Builder|Beneficiary whereNumberOfVisits($value)
 * @method static Builder|Beneficiary whereOtherDocumentType($value)
 * @method static Builder|Beneficiary whereOtherForwardedService($value)
 * @method static Builder|Beneficiary whereOtherReasonOpeningCase($value)
 * @method static Builder|Beneficiary wherePhone($value)
 * @method static Builder|Beneficiary whereProvenanceUlid($value)
 * @method static Builder|Beneficiary wherePurposeOfVisitUlid($value)
 * @method static Builder|Beneficiary whereReasonOpeningCaseUlid($value)
 * @method static Builder|Beneficiary whereServiceDate($value)
 * @method static Builder|Beneficiary whereSpecifyPurposeOfVisit($value)
 * @method static Builder|Beneficiary whereStatus($value)
 * @method static Builder|Beneficiary whereUlid($value)
 * @method static Builder|Beneficiary whereUpdatedAt($value)
 * @method static Builder|Beneficiary whereVisitProposes($value)
 *
 * @mixin Eloquent
 */
class Beneficiary extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'beneficiaries';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $casts = [
        'number_of_visits' => 'int',
        'home_care' => 'bool',
        'status' => 'bool',
    ];

    protected $dates = [
        'birth_date',
        'service_date',
        'date_received',
        '6',
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
        'biosp_ulid',
        '6',
        'other_document_type',
        'other_reason_opening_case',
        'other_forwarded_service',
        'specify_purpose_of_visit',
        'visit_proposes',
        'genre_ulid',
        'provenance_ulid',
        'reason_opening_case_ulid',
        'document_type_ulid',
        'forwarded_service_ulid',
        'purpose_of_visit_ulid',
    ];

    public function biosp(): BelongsTo
    {
        return $this->belongsTo(Biosp::class, 'biosp_ulid');
    }

    public function document_type(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class, 'document_type_ulid');
    }

    public function forwarded_service(): BelongsTo
    {
        return $this->belongsTo(ForwardedService::class, 'forwarded_service_ulid');
    }

    public function purpose_of_visit(): BelongsTo
    {
        return $this->belongsTo(PurposeOfVisit::class, 'purpose_of_visit_ulid');
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_ulid');
    }

    public function provenance(): BelongsTo
    {
        return $this->belongsTo(Provenance::class, 'provenance_ulid');
    }

    public function reason_opening_case(): BelongsTo
    {
        return $this->belongsTo(ReasonOpeningCase::class, 'reason_opening_case_ulid');
    }
}
