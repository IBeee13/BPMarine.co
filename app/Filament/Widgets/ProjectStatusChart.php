<?php
namespace App\Filament\Widgets;

use App\Models\Client;
use Filament\Widgets\ChartWidget;

class ProjectStatusChart extends ChartWidget
{
    protected ?string $heading = 'Status Project';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'data' => [
                        Client::where('status', 'in_progress')->count(),
                        Client::where('status', 'completed')->count(),
                        Client::where('status', 'cancelled')->count(),
                    ],
                    'backgroundColor' => [
                        '#3B82F6',
                        '#10B981',
                        '#EF4444',
                    ],
                ],
            ],
            'labels' => ['In Progress', 'Completed', 'Cancelled'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}