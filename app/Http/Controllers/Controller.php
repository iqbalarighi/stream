<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Jetstream\InteractsWithBanner;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    use InteractsWithBanner;
    
    public function test(Request $request)
    {
        $user = User::all();
        $request->session()->flash('flash.banner', 'Yay it works!');
        return view('test.index', compact('user'));
    }
}
