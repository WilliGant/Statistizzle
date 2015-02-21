<?php

namespace WilliGant\User\Snapshot;

use WilliGant\User\Service\Service;
use WilliGant\User\User;

/**
 * This creates a snapshot of a given users
 *
 * @package WilliGant\User\Snapshot
 */
class SnapshotCalculator
{
    /**
     * @var \LastFmClient\Service\User
     */
    private $lastfmClient;
    /**
     * @var \WilliGant\User\Snapshot\Snapshot
     */
    private $snapshot;


    /**
     * @param \LastFmClient\Service\User        $lastfmClient
     * @param \WilliGant\User\Snapshot\Snapshot $snapshot
     */
    public function __construct(\LastFmClient\Service\User $lastfmClient, Snapshot $snapshot)
    {
        $this->lastfmClient = $lastfmClient;
        $this->snapshot = $snapshot;

        $this->snapshot->flat_date = flat_date('day');
    }

    /**
     * @param \WilliGant\User\User $user
     *
     * @return Snapshot
     */
    public function calculate(User $user)
    {
        $this->snapshot->user_id = $user->id;

        $lastfm_details = $user->getService(Service::TYPE_LASTFM);
        $data           = $this->lastfmClient->getInfo($lastfm_details->identifier);

        $this->snapshot->last_fm_scrobble_count = array_get($data->getData(),'user.playcount');

        return $this->snapshot;
    }


}