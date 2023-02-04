<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\BiospFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Biosp
 *
 * @property string $ulid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $project_name
 * @property string $neighborhood_ulid
 * @property Neighborhood $neighborhood
 * @property Collection|SendMail[] $send_mails
 * @property string|null $deleted_at
 * @property-read Biosp $biosp
 * @property-read Collection|DocumentType[] $documentTypes
 * @property-read int|null $document_types_count
 * @property-read Collection|ForwardedService[] $forwardedServices
 * @property-read int|null $forwarded_services_count
 * @property-read Collection|Genre[] $genres
 * @property-read int|null $genres_count
 * @property-read Collection|Provenance[] $provenances
 * @property-read int|null $provenances_count
 * @property-read Collection|PurposeOfVisit[] $purposeOfVisits
 * @property-read int|null $purpose_of_visits_count
 * @property-read Collection|ReasonOpeningCase[] $reasonOpeningCases
 * @property-read int|null $reason_opening_cases_count
 * @property-read int|null $send_mails_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static BiospFactory factory(...$parameters)
 * @method static Builder|Biosp newModelQuery()
 * @method static Builder|Biosp newQuery()
 * @method static Builder|Biosp query()
 * @method static Builder|Biosp whereCreatedAt($value)
 * @method static Builder|Biosp whereDeletedAt($value)
 * @method static Builder|Biosp whereName($value)
 * @method static Builder|Biosp whereNeighborhoodUlid($value)
 * @method static Builder|Biosp whereProjectName($value)
 * @method static Builder|Biosp whereUlid($value)
 * @method static Builder|Biosp whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Biosp extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'biosps';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'project_name',
        'neighborhood_ulid',
    ];


    public function beneficiaries():HasMany
    {
        return $this->hasMany(Beneficiary::class,'biosp_ulid');
    }
    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class, 'neighborhood_ulid');
    }

    public function send_mails(): BelongsToMany
    {
        return $this->belongsToMany(SendMail::class, 'biosp_send_mails', 'biosps_ulid', 'send_mails_ulid');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_biosps', 'biosp_ulid', 'user_ulid');
    }


   public function genres(): MorphToMany
   {
       return $this->morphedByMany(Genre::class, 'biospable');
   }

    public function documentTypes(): MorphToMany
    {
        return $this->morphedByMany(DocumentType::class, 'biospable');
    }

    public function forwardedServices(): MorphToMany
    {
        return $this->morphedByMany(ForwardedService::class, 'biospable');
    }

    public function provenances(): MorphToMany
    {
        return $this->morphedByMany(Provenance::class, 'biospable');
    }

    public function purposeOfVisits(): MorphToMany
    {
        return $this->morphedByMany(PurposeOfVisit::class, 'biospable');
    }

    public function reasonOpeningCases(): MorphToMany
    {
        return $this->morphedByMany(ReasonOpeningCase::class, 'biospable');
    }
}
