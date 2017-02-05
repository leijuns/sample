<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Http\Request;

use App\Http\Requests;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];
    /*
     * 设置自动对密码进行加密
     * @param string password
     */
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    /*
     * 获取用户头像
     *
     */
    public function getAvatar($size=100){
        $email = $this->attributes['email'];
        $default = $_SERVER['HTTP_HOST']."/head.jpg";
        $hash = md5( strtolower( trim( $email ) ) );
        return "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size /*. "&d=" . urlencode( $default ) */;
    }
}
