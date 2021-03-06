<?php
namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;

use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements BannableContract
{
    use HasApiTokens, Notifiable;
    use HasRoles;
    use Bannable;
    

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password','gender','password_confirmation','date_of_birth','image','mobile_number','national_id','last_login_date',
  ];
  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
        'password', 'remember_token',
  ];



} //end of class
