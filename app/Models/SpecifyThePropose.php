<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SpecifyThePropose
 *
 * @property string $purpose_of_visit_uuid
 * @property string $benificiary_uuid
 * @property string|null $specify_the_propose
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $uuid
 *
 * @property Benificiary $benificiary
 * @property PurposeOfVisit $purpose_of_visit
 *
 * @package App\Models
 */
class SpecifyThePropose extends Model
{
    use Uuids;
	protected $table = 'specify_the_propose';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'purpose_of_visit_uuid',
		'benificiary_uuid',
		'specify_the_propose'
	];

	public function benificiary()
	{
		return $this->belongsTo(Benificiary::class, 'benificiary_uuid');
	}

	public function purpose_of_visit()
	{
		return $this->belongsTo(PurposeOfVisit::class, 'purpose_of_visit_uuid');
	}
}
