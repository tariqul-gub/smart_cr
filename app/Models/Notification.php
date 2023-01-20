<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $send_by
 * @property $send_to
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Notification extends Model
{

  static $rules = [
    'title' => 'required',
    'send_to' => 'required',
  ];

  protected $perPage = 20;


  public function sendByInfo()
  {
    return $this->hasOne(User::class, 'id', 'send_by');
  }
  public function sendToInfo()
  {
    return $this->hasOne(User::class, 'id', 'send_to');
  }
  protected $fillable = ['title', 'description', 'send_by', 'send_to'];
}
