<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 *
 * @property $id
 * @property $room_no
 * @property $level
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Room extends Model
{
    
    static $rules = [
		'room_no' => 'required',
		'level' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['room_no','level'];



}
