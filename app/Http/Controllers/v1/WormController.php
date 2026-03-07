<?php
declare(strict_types=1);

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WormController extends Controller
{
    public function show(Request $r)
    {
        return view('worm.show', ['user' => $r->user()]);
    }

    public function feed(Request $r)
    {
        $user = $r->user();

        if ($user->last_fed_at &&
            Carbon::parse($user->last_fed_at)->isToday()) {

            return view('worm.partials.worm', [
                'user' => $user,
                'message' => 'Сегодня уже кормил'
            ]);
        }

        $user->increment('worm_length');
        $user->update(['last_fed_at' => now()]);

        return view('worm.partials.worm', [
            'user' => $user,
            'message' => 'Червячок доволен'
        ]);
    }
}
