<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('position')
                    ->label('Jabatan/Posisi')
                    ->default(null),
                Select::make('country')
                    ->label('Negara')
                    ->required()
                    ->searchable()
                    ->options([
                        'ID' => 'Indonesia',
                        'MY' => 'Malaysia',
                        'SG' => 'Singapore',
                        'AU' => 'Australia',
                        'US' => 'United States',
                        'GB' => 'United Kingdom',
                        'NL' => 'Netherlands',
                        'DE' => 'Germany',
                        'FR' => 'France',
                        'JP' => 'Japan',
                        'CN' => 'China',
                        'IN' => 'India',
                        'AE' => 'United Arab Emirates',
                        'SA' => 'Saudi Arabia',
                        'RU' => 'Russia',
                        'IT' => 'Italy',
                        'ES' => 'Spain',
                        'CH' => 'Switzerland',
                        'NZ' => 'New Zealand',
                        'TH' => 'Thailand',
                    ]),
                FileUpload::make('photo')
                    ->label('Foto Profil')
                    ->image()
                    ->disk('public')
                    ->directory('testimonials')
                    ->default(null),
                Textarea::make('quote')
                    ->label('Kutipan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->required(),
            ]);
    }
}