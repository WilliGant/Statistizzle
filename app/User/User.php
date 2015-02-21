<?php namespace WilliGant\User;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use WilliGant\User\Service\Service;

/**
 * Class User
 *
 * @property                      $id
 * @property                      $name
 * @property                      $password
 * @property                      $remember_token
 * @property Carbon               $created_at
 * @property Carbon               $updated_at
 *
 * @property Collection|Service[] $services
 *
 * @package WilliGant\User
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

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
    protected $hidden = ['password', 'remember_token'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany('WilliGant\User\Service\Service');
    }


    /**
     * @param $type
     *
     * @return Service|null
     */
    public function getService($type)
    {
        return $this->services->first(function ($key, $service) use ($type) {
            return ($type == $service->type);
        });

    }

}
