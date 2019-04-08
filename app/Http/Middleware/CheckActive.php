<?php

	namespace App\Http\Middleware;

	use Closure;
	use Illuminate\Support\Facades\Auth;

	class CheckActive
	{
		/**
		 * Handle an incoming request.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \Closure  $next
		 * @return mixed
		 */
		public function handle($request, Closure $next)
		{
			$userStatus = Auth::User()->active;
			if($userStatus=='1') {
				return $next($request);
			}
			else{
				Auth::logout();
				$request->session()->flush();
				return redirect(url('login'))->with('errorMsg','auth.noactive');
			}
		}
	}
