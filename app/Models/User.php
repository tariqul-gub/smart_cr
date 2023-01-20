<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;


  static $rules = [
    'name' => 'required',
    'contact' => 'required',
    'user_type' => 'required',
    'batch' => 'required_if:user_type,CR',
    'email' => 'required|email|unique:users,email',
    'password' => 'required',
  ];

  protected $perPage = 20;


  protected $fillable = ['name', 'contact', 'batch', 'password', 'user_type', 'email'];
}
