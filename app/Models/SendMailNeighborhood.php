<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SendMailNeighborhood
 *
 * @property string $uuid
 * @property string|null $neighborhood_uuid
 * @property string|null $send_mail_uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SendMailNeighborhoodFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMailNeighborhood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMailNeighborhood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMailNeighborhood query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMailNeighborhood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMailNeighborhood whereNeighborhoodUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMailNeighborhood whereSendMailUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMailNeighborhood whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMailNeighborhood whereUuid($value)
 * @mixin \Eloquent
 */
class SendMailNeighborhood extends Model
{
    use HasFactory,Uuids;
    protected $table = 'send_mail_neighborhoods';
    protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'neighborhood_uuid','send_mail_uuid'
	];
}
