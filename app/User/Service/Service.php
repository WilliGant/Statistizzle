<?php namespace WilliGant\User\Service;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property        $id
 * @property        $user_id
 * @property        $type
 * @property        $identifier
 * @property        $token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package WilliGant\User\Service
 */
class Service extends Model
{

    const TYPE_LASTFM  = 'lastfm';
    const TYPE_TWITTER = 'twitter';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'identifier', 'token'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['token'];

}
