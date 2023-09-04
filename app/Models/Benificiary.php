<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Benificiary
 *
 * @property string $uuid
 * @property string|null $full_name
 * @property int|null $number_of_visits
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $service_date
 * @property bool|null $home_care
 * @property \Illuminate\Support\Carbon|null $date_received
 * @property bool|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $other_document_type
 * @property string|null $other_reason_opening_case
 * @property string|null $other_forwarded_service
 * @property string|null $specify_purpose_of_visit
 * @property string|null $visit_proposes
 * @property string|null $neighborhood_uuid
 * @property string|null $genre_uuid
 * @property string|null $provenace_uuid
 * @property string|null $reason_opening_case_uuid
 * @property string|null $document_type_uuid
 * @property string|null $forwarded_service_uuid
 * @property string|null $purpose_of_visit_uuid
 * @property string|null $specify_forwarded_service
 * @property string|null $known_of_biosp_uuid
 * @property string|null $other_known_of_biosp
 * @property-read \App\Models\DocumentType|null $document_type
 * @property-read \App\Models\ForwardedService|null $forwarded_service
 * @property-read \App\Models\Genre|null $genre
 * @property-read \App\Models\KnownOfBiosp|null $known_of_biosp
 * @property-read \App\Models\Neighborhood|null $neighborhood
 * @property-read \App\Models\Provenace|null $provenace
 * @property-read \App\Models\PurposeOfVisit|null $purpose_of_visit
 * @property-read \App\Models\ReasonOpeningCase|null $reason_opening_case
 * @method static \Database\Factories\BenificiaryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereDateReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereDocumentTypeUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereForwardedServiceUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereGenreUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereHomeCare($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereKnownOfBiospUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereNeighborhoodUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereNumberOfVisits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereOtherDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereOtherForwardedService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereOtherKnownOfBiosp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereOtherReasonOpeningCase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereProvenaceUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary wherePurposeOfVisitUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereReasonOpeningCaseUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereServiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereSpecifyForwardedService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereSpecifyPurposeOfVisit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary whereVisitProposes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Benificiary withoutTrashed()
 * @mixin \Eloquent
 */
class Benificiary extends Model
{
    use Uuids, HasFactory, SoftDeletes;
    protected $table = 'benificiaries';
    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $dateFormat = 'Y-m-d\TH:i:s.u';

    protected function asDateTime($value)
    {
        try {
            return parent::asDateTime($value);
        } catch (\InvalidArgumentException $e) {
            return parent::asDateTime(new \DateTimeImmutable($value));
        }
    }

    public function newQuery()
    {
        $query = parent::newQuery();

        if ($this->usesTimestamps()) {
            $table = $this->getTable();

            $createdAt = $this->getCreatedAtColumn();
            $updatedAt = $this->getUpdatedAtColumn();
            $query
                ->select()
                ->addSelect(DB::raw("$table.$updatedAt  as $updatedAt"))
                ->addSelect(DB::raw("$table.$createdAt  as $createdAt"));; // Using CAST instead of CONCAT as it is compatible with SQLite database
        }

        return $query;
    }

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
        'date_received',
        'status',
        'other_document_type',
        'other_reason_opening_case',
        'other_forwarded_service',
        'specify_forwarded_service',
        'visit_proposes',
        'specify_purpose_of_visit',
        'neighborhood_uuid',
        'genre_uuid',
        'provenace_uuid',
        'reason_opening_case_uuid',
        'document_type_uuid',
        'forwarded_service_uuid',
        'purpose_of_visit_uuid',
        'known_of_biosp_uuid'
    ];

    public function document_type()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_uuid');
    }

    public function forwarded_service()
    {
        return $this->belongsTo(ForwardedService::class, 'forwarded_service_uuid');
    }

    public function purpose_of_visit()
    {
        return $this->belongsTo(PurposeOfVisit::class, 'purpose_of_visit_uuid');
    }

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

    public function known_of_biosp()
    {
        return $this->belongsTo(KnownOfBiosp::class, 'known_of_biosp_uuid');
    }
}
