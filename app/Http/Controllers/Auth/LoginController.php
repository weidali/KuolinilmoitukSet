<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


	use AuthenticatesUsers;

	protected function redirectTo()
	{
		$user = \Auth::user();
		if($user->isAdmin()) {
			return route('panel');
		} else {
			return route('index');
		}
	}
	// /**
 // 	* @return string
 // 	**/
	// public function redirectTo()
	// {

	//     /** @var User $user */
	//     $user = Auth::user();

	//     if( !$user ) {
	//         abort(403, "Something went completely wrong");
	//     }

	//     switch( $user->role ) {
	//         case User::SUPERADMIN:
	//             return '/admin';
	//         case User::CASUAL:
	//             return !!$user->bdate ? '/tests' : '/profile';
	//         case USER::COMPANY:
	//             return '/dashboard';
	//         default:
	//             abort(403, "Something went wrong");
	//     }
	// }

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	// protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
}
