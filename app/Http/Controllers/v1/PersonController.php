<?php
declare(strict_types=1);

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function show(Request $r)
    {
        return view('person.show', ['user' => $r->user()]);
    }

    public function destroy(Request $r)
    {
        $user = $r->user();
        Auth::logout();
        $user->delete();
        return redirect()->route('home');
    }
}
