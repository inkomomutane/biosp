<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SendMail
 *
 * @property string $uuid
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Neighborhood> $neighborhoods
 * @property-read int|null $neighborhoods_count
 * @method static \Database\Factories\SendMailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMail whereUuid($value)
 * @mixin \Eloquent
 */
class SendMail extends Model
{
    use HasFactory,Uuids;
    protected $table = 'send_mails';
    protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'email'
	];

    public function neighborhoods()
    {
        return $this->belongsToMany(Neighborhood::class,'send_mail_neighborhoods')->as('send_mail_neighborhoods');
    }
}
