<?php namespace WilliGant\User\Snapshot;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Snapshot
 *
 * @property        $id
 * @property        $user_id
 * @property        $flat_date
 * @property        $twitter_follower_count
 * @property        $last_fm_scrobble_count
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package WilliGant\User\Snapshot
 */
class Snapshot extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'life_snapshots';

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

}
