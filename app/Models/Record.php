<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Record
 *
 * @property $id
 * @property $title
 * @property $file
 * @property $room_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Record extends Model
{

  static $rules = [
    'title' => 'required',
    'file' => 'required|mimes:mp3, MP3',
    'room_id' => 'required',
  ];

  /**
   * Get the room associated with the Record
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function room()
  {
    return $this->hasOne(Room::class, 'id', 'room_id');
  }
  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['title', 'file', 'room_id', 'created_by'];
}
