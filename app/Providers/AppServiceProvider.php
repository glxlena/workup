<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('pt');
        
        View::composer('layout', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();

                // pegar TODAS as notificações (não apenas não lidas)
                $all = $user->notifications()->latest()->get();

                // separar por tipo
                $favoriteNotifications = $all->filter(function($n){
                    return isset($n->data['type']) && $n->data['type'] === 'favorite';
                });

                $reviewNotifications = $all->filter(function($n){
                    return isset($n->data['type']) && $n->data['type'] === 'review';
                });

                $unreadCount = $user->unreadNotifications()->count();

                $view->with([
                    'favoriteNotifications' => $favoriteNotifications,
                    'reviewNotifications' => $reviewNotifications,
                    'unreadCount' => $unreadCount,
                ]);
            } else {
                $view->with([
                    'favoriteNotifications' => collect(),
                    'reviewNotifications' => collect(),
                ]);
            }
        });
    }
}
