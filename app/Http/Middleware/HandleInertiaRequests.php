<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => fn () => $request->user()
                ? $request->user()->only('id', 'name', 'email', 'has_admin_link', 'user_level')
                : null,
                'permissions' => fn () => $request->user()
                ? $request->user()->allPermissions()
                : null,
            ],
            'flash' => [
                'succeed' => fn () => $request->session()->get('succeed'),
                'notice' => fn () => $request->session()->get('notice'),
                'error' => fn () => $request->session()->get('error'),
            ],
        ];
    }
}
