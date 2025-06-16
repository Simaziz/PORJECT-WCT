<?php
// app/Http/Controllers/Auth/TwoFactorController.php
use PragmaRX\Google2FA\Google2FA;

public function show()
{
    return view('auth.2fa-verify');
}

public function verify(Request $request)
{
    $request->validate(['code' => 'required']);

    $user = User::find($request->session()->get('2fa_user_id'));
    $google2fa = new Google2FA();

    if ($google2fa->verifyKey($user->google2fa_secret, $request->code)) {
        Auth::login($user);
        return redirect()->intended('dashboard');
    }

    return back()->with('error', 'Invalid 2FA code.');
}