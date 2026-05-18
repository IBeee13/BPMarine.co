<?php
namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', Project::count())
                ->description('Kapal Pinisi yang dibangun')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([3, 5, 7, 4, 6, 8, Project::count()]),

            Stat::make('New Messages', ContactMessage::where('is_read', false)->count())
                ->description('Pesan belum dibaca')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning')
                ->chart([2, 4, 3, 5, 2, 4, ContactMessage::where('is_read', false)->count()]),

            Stat::make('Active Clients', Client::where('status', 'in_progress')->count())
                ->description('Proyek sedang berjalan')
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->chart([1, 2, 3, 2, 4, 3, Client::where('status', 'in_progress')->count()]),

            Stat::make('Completed Projects', Client::where('status', 'completed')->count())
                ->description('Proyek selesai')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->chart([1, 1, 2, 2, 3, 3, Client::where('status', 'completed')->count()]),
        ];
    }
}