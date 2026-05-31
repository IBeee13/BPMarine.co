<?php
namespace App\Filament\Resources\ConstructionProjects\Pages;
use App\Filament\Resources\ConstructionProjects\ConstructionProjectResource;

class CreateConstructionProject extends \Filament\Resources\Pages\CreateRecord
{
    protected static string $resource = ConstructionProjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['is_under_construction'] = true;
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}