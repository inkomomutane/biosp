<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class SendMail
 *
 * @property string $uuid
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Biosp[] $biosps
 *
 * @package App\Models
 */
class SendMail extends Model
{
    use HasFactory;

	protected $table = 'send_mails';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'email'
	];

	public function biosps() : BelongsToMany
	{
		return $this->belongsToMany(Biosp::class, 'biosp_send_mails', 'send_mails_uuid', 'biosps_uuid')
					->withPivot('uuid')
					->withTimestamps();
	}
}
