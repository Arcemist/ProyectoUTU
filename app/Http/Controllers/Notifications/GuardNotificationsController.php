<?php

namespace App\Http\Controllers\Notifications;

use app\http\controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class GuardNotificationsController extends Controller
{

    public function show(Request $request): array
    {
        return [
            ['nombre' => 'epa'],
            ['nombre' => 'fium'],
            ['nombre' => 'ba']
        ];
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
    }
}
