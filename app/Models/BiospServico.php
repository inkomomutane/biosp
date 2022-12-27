<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BiospServico
 *
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $model_type
 * @property string|null $model_id
 * @property string|null $table
 *
 * @package App\Models
 */
class BiospServico extends Model
{

    use HasFactory;

	protected $table = 'biosp_servicos';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'model_type',
		'model_id',
		'table'
	];
}
