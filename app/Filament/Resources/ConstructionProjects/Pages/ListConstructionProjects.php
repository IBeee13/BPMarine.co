<?php

namespace App\Filament\Resources\ConstructionProjects\Pages;

use App\Filament\Resources\ConstructionProjects\ConstructionProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConstructionProjects extends ListRecords
{
    protected static string $resource = ConstructionProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}