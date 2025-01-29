<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\Request;
use App\Models\User;

class AuthEventsLoginListener
{
    protected $request;
    
    /**
     * Create the event listener.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     * Добавление слушателя к встроенному событию Illuminate\Auth\Events\Login
     * Документация https://laravel.su/docs/11.x/authentication#events
     * Список всех зарегистрированных слушателей php artisan event:list
     */
    public function handle(Login $event): void
    {
        $user = User::find($event->user->id);
        $user->last_login_at = now();
        $user->last_login_ip = $this->request->getClientIp();
        $user->save();
    }
}
