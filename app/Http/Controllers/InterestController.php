<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\Serial;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    public function index_video(Request $request)
    {
      if (Auth::user())
      {
          $interest = Interest::query();
          $interest = $interest->where('interestable_id' , $request->interestable_id)->where('user_id',\auth()->user()->id)->first();
          if ($interest)
          {
              $interest->delete();
              //message
              return back();
          }else
          {
              \auth()->user()->interests()->create([
                  'title' => $request->title,
                  'interestable_id' => $request->interestable_id,
                  'interestable_type' => $request->interestable_type
              ]);
              // message
              return back();
          }

      }
      dd('login to website');
    }

    public function index_serial(Request $request)
    {

        if (Auth::user())
        {
            $interest = Interest::query();
            $interest = $interest->where('interestable_id' , $request->interestable_id)->where('user_id',\auth()->user()->id)->first();
            if ($interest)
            {
                $interest->delete();
                //message
                return back();
            }else
            {
                \auth()->user()->interests()->create([
                    'title' => $request->title,
                    'interestable_id' => $request->interestable_id,
                    'interestable_type' => $request->interestable_type
                ]);
                // message
                return back();
            }

        }
        dd('login to website');
    }
}
