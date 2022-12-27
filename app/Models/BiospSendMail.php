<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class BiospSendMail
 *
 * @property string $biosps_uuid
 * @property string $send_mails_uuid
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Biosp $biosp
 * @property SendMail $send_mail
 *
 * @package App\Models
 */
class BiospSendMail extends Model
{
    use HasFactory;
    use Uuids;

	protected $table = 'biosp_send_mails';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'biosps_uuid',
		'send_mails_uuid'
	];

	public function biosp() : BelongsTo
	{
		return $this->belongsTo(Biosp::class, 'biosps_uuid');
	}

	public function send_mail() : BelongsTo
	{
		return $this->belongsTo(SendMail::class, 'send_mails_uuid');
	}
}
