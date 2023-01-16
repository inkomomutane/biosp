<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Biosp
 *
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $project_name
 * @property string $neighborhood_uuid
 * @property Neighborhood $neighborhood
 * @property Collection|SendMail[] $send_mails
 */
class Biosp extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'biosps';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'project_name',
        'neighborhood_uuid',
    ];

    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class, 'neighborhood_uuid');
    }

    public function send_mails(): BelongsToMany
    {
        return $this->belongsToMany(SendMail::class, 'biosp_send_mails', 'biosps_uuid', 'send_mails_uuid')
                    ->withPivot('uuid')
                    ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_biosps', 'biosp_uuid', 'user_uuid')
                    ->withPivot('uuid')
                    ->withTimestamps();
    }

    public function biosp(): BelongsTo
    {
        return $this->belongsTo(Biosp::class, 'biosp_uuid');
    }

   public function genres(): MorphToMany
   {
        return $this->morphedByMany(Genre::class,'biospable');
   }

    public function documentTypes(): MorphToMany
    {
        return $this->morphedByMany(DocumentType::class,'biospable');
    }

    public function forwardedServices(): MorphToMany
    {
        return $this->morphedByMany(ForwardedService::class,'biospable');
    }

    public function provenances(): MorphToMany
    {
        return $this->morphedByMany(Provenance::class,'biospable');
    }


    public function purposeOfVisits(): MorphToMany
    {
        return $this->morphedByMany(PurposeOfVisit::class,'biospable');
    }



    public function reasonOpeningCases(): MorphToMany
    {
        return $this->morphedByMany(ReasonOpeningCase::class,'biospable');
    }



}
