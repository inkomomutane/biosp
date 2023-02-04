<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\SendMailFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class SendMail
 *
 * @property string $ulid
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Biosp[] $biosps
 * @property-read int|null $biosps_count
 *
 * @method static SendMailFactory factory(...$parameters)
 * @method static Builder|SendMail newModelQuery()
 * @method static Builder|SendMail newQuery()
 * @method static Builder|SendMail query()
 * @method static Builder|SendMail whereCreatedAt($value)
 * @method static Builder|SendMail whereEmail($value)
 * @method static Builder|SendMail whereUlid($value)
 * @method static Builder|SendMail whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class SendMail extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'send_mails';

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $fillable = [
        'email',
    ];

    public function biosps(): BelongsToMany
    {
        return $this->belongsToMany(Biosp::class, 'biosp_send_mails', 'send_mails_ulid', 'biosps_ulid');
    }
}
