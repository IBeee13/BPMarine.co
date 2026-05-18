<?php
namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class MessagesChart extends ChartWidget
{
    protected ?string $heading = 'Pesan Masuk Per Bulan';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = collect(range(5, 0))->map(function ($monthsAgo) {
            $date = Carbon::now()->subMonths($monthsAgo);
            return ContactMessage::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        });

        $labels = collect(range(5, 0))->map(function ($monthsAgo) {
            return Carbon::now()->subMonths($monthsAgo)->format('M Y');
        });

        return [
            'datasets' => [
                [
                    'label' => 'Pesan Masuk',
                    'data' => $data->values()->toArray(),
                    'fill' => true,
                    'backgroundColor' => 'rgba(24, 37, 77, 0.1)',
                    'borderColor' => '#18254D',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels->values()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}