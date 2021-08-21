<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property string $uuid
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $neighborhood_uuid
 *
 * @property Neighborhood $neighborhood
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use Uuids,HasApiTokens, HasFactory, Notifiable;
	protected $table = 'users';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'neighborhood_uuid'
	];

	public function neighborhood()
	{
		return $this->belongsTo(Neighborhood::class, 'neighborhood_uuid');
	}
}
