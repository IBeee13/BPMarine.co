<?php

namespace App\Filament\Resources\Clients\Pages;

use App\Filament\Resources\Clients\ClientResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }

    public function form(Schema $form): Schema
    {
        return $form->schema([
            Section::make('Informasi Client')
                ->schema([
                    TextInput::make('name')->disabled()->dehydrated(false),
                    TextInput::make('email')->disabled()->dehydrated(false),
                    TextInput::make('phone')->disabled()->dehydrated(false),
                    TextInput::make('company')->disabled()->dehydrated(false),
                    TextInput::make('country')->disabled()->dehydrated(false),
                ])->columns(2),

            Section::make('Status Proyek')
                ->schema([
                    Select::make('status')
                        ->label('Project Status')
                        ->options([
                            'in_progress' => '🔄 In Progress',
                            'completed'   => '✅ Completed',
                            'cancelled'   => '❌ Cancelled',
                        ])->required(),
                    Textarea::make('notes')
                        ->label('Catatan')
                        ->columnSpanFull(),
                ])->columns(1),
        ]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return [
            'status' => $data['status'],
            'notes'  => $data['notes'] ?? null,
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}