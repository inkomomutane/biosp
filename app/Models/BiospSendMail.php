<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class BiospSendMail
 *
 * @property string $biosps_ulid
 * @property string $send_mails_ulid
 * @property string $ulid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Biosp $biosp
 * @property SendMail $send_mail
 */
class BiospSendMail extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'biosp_send_mails';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'biosps_ulid',
        'send_mails_ulid',
    ];

    public function biosp(): BelongsTo
    {
        return $this->belongsTo(Biosp::class, 'biosps_ulid');
    }

    public function send_mail(): BelongsTo
    {
        return $this->belongsTo(SendMail::class, 'send_mails_ulid');
    }
}
