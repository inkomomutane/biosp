<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class, 'neighborhood_ulid');
    }

    public function send_mails(): BelongsToMany
    {
        return $this->belongsToMany(SendMail::class, 'biosp_send_mails', 'biosps_ulid', 'send_mails_ulid')
                    ->withPivot('ulid')
                    ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_biosps', 'biosp_ulid', 'user_ulid')
                    ->withPivot('ulid')
                    ->withTimestamps();
    }

    public function biosp(): BelongsTo
    {
        return $this->belongsTo(Biosp::class, 'biosp_ulid');
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
