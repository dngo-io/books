<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
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
     * Redirect the user to the Steem Connect authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('steem')->redirect();
    }

    /**
     * Obtain the user information from Steem Connect
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        $steem = Socialite::driver('steem')->user();
        $user  = $this->em->getRepository(User::class)->findOneByAccount($steem->nickname);

        // If the user already registered, update access token.
        // If no matching user exists, create one.
        if($user === null)
        {
            $user = new User();
            $user->setName($steem->name);
            $user->setIsActive(1);
            $user->setAccount($steem->nickname);
            $user->setProfileImage($steem->avatar);
            $user->setAccessToken($steem->token);
        } else {
            $user->setName($steem->name);
            $user->setProfileImage($steem->avatar);
            $user->setAccessToken($steem->token);
        }

        $this->em->persist($user);
        $this->em->flush();

        auth()->login($user);
        return redirect()->to('/');
    }
}
