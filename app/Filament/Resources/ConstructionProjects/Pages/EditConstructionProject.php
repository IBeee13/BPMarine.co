<?php
namespace App\Filament\Resources\ConstructionProjects\Pages;
use App\Filament\Resources\ConstructionProjects\ConstructionProjectResource;

class EditConstructionProject extends \Filament\Resources\Pages\EditRecord
{
    protected static string $resource = ConstructionProjectResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}