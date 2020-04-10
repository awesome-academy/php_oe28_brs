<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;

class CheckRoleAdmin
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
        $user = $request->user();

        if ($user->role_id == UserRole::Admin) {
            return $next($request);
        } else {
            return abort(403, trans('messages.forbidden'));
        }
    }
}
