<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Biosp
 *
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $project_name
 * @property string $neighborhood_uuid
 *
 * @property Neighborhood $neighborhood
 * @property Collection|SendMail[] $send_mails
 *
 * @package App\Models
 */
class Biosp extends Model
{
    use HasFactory;
    use Uuids;

	protected $table = 'biosps';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'project_name',
		'neighborhood_uuid'
	];

	public function neighborhood() : BelongsTo
	{
		return $this->belongsTo(Neighborhood::class, 'neighborhood_uuid');
	}

	public function send_mails() : BelongsToMany
	{
		return $this->belongsToMany(SendMail::class, 'biosp_send_mails', 'biosps_uuid', 'send_mails_uuid')
					->withPivot('uuid')
					->withTimestamps();
	}
}
