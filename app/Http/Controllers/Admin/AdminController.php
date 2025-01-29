<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminController extends Controller
{
    // Главная страница с уведомлениями
    public function home()
    {
        // Непрочитанные с датой сегодня через date()
        // $current_notifications = \App\Models\Notification::whereNull('readed_at')
        //                                             ->whereDate('date', date('Y-m-d'))
        //                                             ->get();

        // // Непрочитанные с датой ранее
        // $last_notifications = \App\Models\Notification::whereNull('readed_at')
        //                                         ->whereDate('date', '<', date('Y-m-d'))
        //                                         ->get();

        // // Клиенты у которых месяц и день рождения равен текущим месяцу и дню
        // $birthdate_notifications = \App\Models\Client::whereMonth('birthdate', date('m'))
        //                                                 ->whereDay('birthdate', date('d'))
        //                                                 ->get();

        // // Автор
        // $current_notifications->each(function ($item) {
        //     $item->author = (new \App\Services\Author())->author_string($item);
        // });

        // $last_notifications->each(function ($item) {
        //     $item->author = (new \App\Services\Author())->author_string($item);
        // });
        
        // return view('dashboard.home', compact('current_notifications', 'last_notifications', 'birthdate_notifications'));
        return view('dashboard.home');
    }

}
