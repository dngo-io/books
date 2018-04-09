<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Repositories\UserRepository;
use App\Support\AppController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class LoginController
 *
 * @package    App\Http\Controllers\Auth
 * @subpackage App\Http\Controllers\Auth\LoginController
 */
class LoginController extends AppController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * @var EntityManagerInterface $em
     */
    protected $em;

    /**
     * LoginController constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->middleware('guest', ['except' => 'logout']);
    }


    /**
     * Show user a warning message about EU Cookie Law and Steem Connect third party authentication redirection.
     *
     * @return \Illuminate\Http\Response
     */
    public function warning()
    {
        return view('login');
    }

    /**
     * Redirect the user to the Steem Connect authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('steem')->scopes(['login', 'vote', 'comment','offline'])->redirect();
    }

    /**
     * Obtain the user information from Steem Connect
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        $steem = Socialite::driver('steem')->user();

        /** @var UserRepository $userRepository */
        $userRepository  = $this->em->getRepository(User::class);
        $user = $userRepository->findOneByAccount($steem->nickname);

        $avatar = empty($steem->avatar) ? asset('assets/custom/img/profile-picture.jpg') : $steem->avatar;

        // If the user already registered, update access token.
        // If no matching user exists, create one.
        if($user === null)
        {
            $user = new User();
            $user->setName($steem->name);
            $user->setIsActive(1);
            $user->setAccount($steem->nickname);
            $user->setProfileImage($avatar);
            $user->setAccessToken($steem->token);
            $user->setRefreshToken($steem->refreshToken);
            $this->em->persist($user);
        } else {
            /** @var User $user */
            $user->setName($steem->name);
            $user->setProfileImage($avatar);
            $user->setAccessToken($steem->token);
            $user->setRefreshToken($steem->refreshToken);
        }

        $this->em->flush();

        auth()->login($user, true);
        return redirect()->to('/');
    }
}
