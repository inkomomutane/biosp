<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\KnownOfBiosp
 *
 * @property string $uuid
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Benificiary> $benificiaries
 * @property-read int|null $benificiaries_count
 * @method static \Database\Factories\KnownOfBiospFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp query()
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|KnownOfBiosp withoutTrashed()
 * @mixin \Eloquent
 */
class KnownOfBiosp extends Model
{
    use Uuids,HasFactory,SoftDeletes;
	protected $table = 'known_of_biosps';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function benificiaries()
	{
		return $this->hasMany(Benificiary::class, 'known_of_biosp_uuid');
	}
}
