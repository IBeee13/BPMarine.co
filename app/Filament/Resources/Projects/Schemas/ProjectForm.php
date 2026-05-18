<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('thumbnail')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('client')
                    ->default(null),
                TextInput::make('location')
                    ->default(null),
                TextInput::make('year_built')
                    ->default(null),
                TextInput::make('length')
                    ->default(null),
                TextInput::make('capacity')
                    ->default(null),
                Toggle::make('featured')
                    ->required(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
