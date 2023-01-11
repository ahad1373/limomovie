<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class VipUserController extends Controller
{
    public function vip($month)
    {

        $user = auth()->user();
        $viptime = $user->isActive() ? Carbon::parse($user->viptime) : Carbon::now();
        $user->update([
            'viptime' => $viptime->addMonth($month)
        ]);
        return back();
    }
}
