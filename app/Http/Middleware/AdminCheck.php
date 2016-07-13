<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class AdminCheck
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Middleware is admin check if has role
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {

        if ($this->user->isAdmin($request->user()->id)) {

            return $next($request);
        }

        return redirect('/');

    }
}
