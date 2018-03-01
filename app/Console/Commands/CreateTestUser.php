<?php

namespace App\Console\Commands;

use App\Entities\User;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;
use function Sodium\randombytes_random16;

class CreateTestUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dngo:create:testuser';

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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $em = app('em');

        $userRepository = $em->getRepository(User::class);

        if (null == $userRepository->findOneByAccount('dngotester')) {
            $user = new User();
            $user->setAccount('dngotester');
            $user->setIsActive(1);
            $user->setProfileImage(asset('assets/custom/img/profile-picture.jpg'));
            $user->setName('Dngo Tester');
            $user->setUuid(Uuid::uuid1());

            $em->persist($user);
            $em->flush();
        }

        $this->output->writeln('User dngotestuser is created');

    }
}
