<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Biospdatabase
 * 
 * @property string $uuid
 * @property string|null $full_name
 * @property int|null $number_of_visits
 * @property Carbon|null $birth_date
 * @property string|null $phone
 * @property Carbon|null $service_date
 * @property bool|null $home_care
 * @property string|null $purpose_of_visit
 * @property Carbon|null $date_received
 * @property bool|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $document_types_id
 * @property int $genres_id
 * @property int $addresses_id
 * @property int $forwarded_services_id
 * @property int $reason_opening_cases_id
 * @property int $purpose_of_visits_id
 *
 * @package App\Models
 */
class Biospdatabase extends Model
{
	use SoftDeletes;
	protected $table = 'biospdatabases';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $casts = [
		'number_of_visits' => 'int',
		'home_care' => 'bool',
		'status' => 'bool',
		'document_types_id' => 'int',
		'genres_id' => 'int',
		'addresses_id' => 'int',
		'forwarded_services_id' => 'int',
		'reason_opening_cases_id' => 'int',
		'purpose_of_visits_id' => 'int'
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
		'purpose_of_visit',
		'date_received',
		'status',
		'document_types_id',
		'genres_id',
		'addresses_id',
		'forwarded_services_id',
		'reason_opening_cases_id',
		'purpose_of_visits_id'
	];
}
