<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function authenticate()
    // {
    //     $credentials = $this->only('email', 'password');

    //     // Attempt to authenticate user
    //     if (Auth::guard('web')->attempt($credentials)) {
    //         return true;
    //     }

    //     // If neither authentication attempt was successful, throw an exception
    //     throw \Illuminate\Validation\ValidationException::withMessages([
    //         'email' => [trans('auth.failed')],
    //     ]);
    // }

    public function authenticate()
{
    $credentials = $this->only('email', 'password');
    $user = User::where('email', $this->email)->first();

    // If user exists and is locked, deny login
    if ($user && $user->is_locked) {
        throw ValidationException::withMessages([
            'email' => ['This account is locked. Please contact an administrator.'],
        ]);
    }

    // Attempt authentication
    if (Auth::guard('web')->attempt($credentials)) {
        // Reset attempts on success
        if ($user) {
            $user->update([
                'login_attempts' => 0,
                'is_locked' => false,
            ]);
        }

        return true;
    }

    // If authentication fails
    if ($user) {
        $user->increment('login_attempts');

        if ($user->login_attempts >= 3) {
            $user->update(['is_locked' => true]);
        }
    }

    throw ValidationException::withMessages([
        'email' => [trans('auth.failed')],
    ]);
}

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
