<?php


namespace App\Console\Commands;

use App\Entities\Role;
use App\Entities\User;
use Doctrine\ORM\EntityManager;
use Illuminate\Console\Command;

class DngoUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dngo:user {--username=} {--role=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a test user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        /** @var EntityManager $em */
        $em = app('em');
        $username = $this->input->getOption('username');

        if($username) {
            /** @var User $user */
            $user = $em->getRepository(User::class)->findOneBy(['account' => $username]);
            if (!$user) die($this->output->writeln("user not found"));

            $role = new Role($this->input->getOption("role"));
            $user->addRole($role);
            $em->flush($user);
        }

    }
}