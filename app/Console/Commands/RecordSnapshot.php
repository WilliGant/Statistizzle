<?php namespace WilliGant\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use WilliGant\User\Snapshot\SnapshotCalculator;
use WilliGant\User\User;

/**
 * Records a snapshot of a user's life and stores it in the table
 *
 * @package WilliGant\Console\Commands
 */
class RecordSnapshot extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'snapshot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Record the snapshot for a given user';
    /**
     * @var \WilliGant\User\Snapshot\SnapshotCalculator
     */
    private $snapshotCalculator;

    /**
     * Create a new command instance.
     *
     * @param \WilliGant\User\Snapshot\SnapshotCalculator $snapshotCalculator
     *
     * @return \WilliGant\Console\Commands\RecordSnapshot
     */
    public function __construct(SnapshotCalculator $snapshotCalculator)
    {
        parent::__construct();
        $this->snapshotCalculator = $snapshotCalculator;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        foreach ( User::all() as $user ) {
            $snapshot = $this->snapshotCalculator->calculate($user);
            $snapshot->save(); //TODO find support for insertUpdate
            $this->info('Saved snapshot for ' . $user->name);
        }
    }
}
