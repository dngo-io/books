<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BookAudioRepository;

class ModerationComposer {

    /**
     * @var BookAudioRepository
     */
    private $bookAudioRepository;

    public function __construct(BookAudioRepository $bookAudioRepository)
    {
        $this->bookAudioRepository = $bookAudioRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(Auth::check() === true && Auth::user()->checkRole('moderator') === true)
        {
            $moderation = [
                'is_mod'  => true,
                'pending' => 0, $this->bookAudioRepository->count(['status' => $this->bookAudioRepository::STATUS_PENDING]),
            ];
        } else {
            $moderation = [
                'is_mod'  => false,
                'pending' => 0,
            ];
        }

        $view->with('moderation', $moderation);
    }
}