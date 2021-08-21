<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentType
 * 
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id
 * @property string|null $name
 *
 * @package App\Models
 */
class DocumentType extends Model
{
	protected $table = 'document_types';

	protected $fillable = [
		'name'
	];
}
