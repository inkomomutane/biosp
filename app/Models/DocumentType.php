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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DocumentType
 *
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string $ulid
 * @property Collection|Beneficiary[] $beneficiaries
 * @property-read int|null $beneficiaries_count
 * @property-read Collection|\App\Models\Biosp[] $biosps
 * @property-read int|null $biosps_count
 * @method static \Database\Factories\DocumentTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newQuery()
 * @method static \Illuminate\Database\Query\Builder|DocumentType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereUlid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|DocumentType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DocumentType withoutTrashed()
 * @mixin \Eloquent
 */
class DocumentType extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUlids;

    protected $table = 'document_types';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class, 'document_type_ulid');
    }

    public function biosps(): MorphToMany
    {
        return $this->morphToMany(Biosp::class, 'biospable');
    }
}
