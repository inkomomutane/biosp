<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurposeOfVisit
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 *
 * @package App\Models
 */
class PurposeOfVisit extends Model
{
	protected $table = 'purpose_of_visits';

	protected $fillable = [
		'name'
	];
}
