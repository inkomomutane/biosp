<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\BiospSendMailFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
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
 *
 * @method static BiospSendMailFactory factory(...$parameters)
 * @method static Builder|BiospSendMail newModelQuery()
 * @method static Builder|BiospSendMail newQuery()
 * @method static Builder|BiospSendMail query()
 * @method static Builder|BiospSendMail whereBiospsUlid($value)
 * @method static Builder|BiospSendMail whereCreatedAt($value)
 * @method static Builder|BiospSendMail whereSendMailsUlid($value)
 * @method static Builder|BiospSendMail whereUlid($value)
 * @method static Builder|BiospSendMail whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class BiospSendMail extends Model
{
    use HasFactory;

    protected $table = 'biosp_send_mails';

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
