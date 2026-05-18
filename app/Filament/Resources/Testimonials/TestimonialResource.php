<?php

namespace App\Filament\Resources\Testimonials;

use App\Filament\Resources\Testimonials\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Testimonial';
    protected static \UnitEnum|string|null $navigationGroup = 'Konten';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Section::make('Informasi Pemberi Testimonial')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('position')
                        ->label('Jabatan / Keterangan')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Travel Blogger & Yacht Enthusiast'),

                    Forms\Components\Select::make('country')
                        ->label('Negara')
                        ->required()
                        ->searchable()
                        ->options([
                            'ID' => '🇮🇩 Indonesia',
                            'AU' => '🇦🇺 Australia',
                            'JP' => '🇯🇵 Japan',
                            'FR' => '🇫🇷 France',
                            'MX' => '🇲🇽 Mexico',
                            'IE' => '🇮🇪 Ireland',
                            'SE' => '🇸🇪 Sweden',
                            'US' => '🇺🇸 United States',
                            'GB' => '🇬🇧 United Kingdom',
                            'DE' => '🇩🇪 Germany',
                            'NL' => '🇳🇱 Netherlands',
                            'IT' => '🇮🇹 Italy',
                            'ES' => '🇪🇸 Spain',
                            'SG' => '🇸🇬 Singapore',
                            'MY' => '🇲🇾 Malaysia',
                            'CN' => '🇨🇳 China',
                            'KR' => '🇰🇷 South Korea',
                            'IN' => '🇮🇳 India',
                            'BR' => '🇧🇷 Brazil',
                            'ZA' => '🇿🇦 South Africa',
                            'NZ' => '🇳🇿 New Zealand',
                            'CA' => '🇨🇦 Canada',
                            'RU' => '🇷🇺 Russia',
                            'AE' => '🇦🇪 UAE',
                            'SA' => '🇸🇦 Saudi Arabia',
                            'TH' => '🇹🇭 Thailand',
                            'PH' => '🇵🇭 Philippines',
                            'VN' => '🇻🇳 Vietnam',
                            'PT' => '🇵🇹 Portugal',
                            'CH' => '🇨🇭 Switzerland',
                        ])
                        ->placeholder('Pilih negara...'),

                    Forms\Components\FileUpload::make('photo')
                        ->label('Foto Profil')
                        ->image()
                        ->imageEditor()
                        ->directory('testimonials')
                        ->maxSize(2048)
                        ->columnSpanFull(),
                ])->columns(2),

            Section::make('Isi Testimonial')
                ->schema([
                    Forms\Components\Textarea::make('quote')
                        ->label('Kutipan')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),
                ]),

            Section::make('Pengaturan Tampilan')
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Tampilkan')
                        ->default(true),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0)
                        ->helperText('Angka lebih kecil tampil lebih dulu'),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular()
                    ->defaultImageUrl(asset('img/default-avatar.png')),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('country')
                    ->label('Negara')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('quote')
                    ->label('Kutipan')
                    ->limit(60)
                    ->tooltip(fn($record) => $record->quote),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif'),

                Tables\Filters\SelectFilter::make('country')
                    ->label('Negara')
                    ->options([
                        'ID' => 'Indonesia',
                        'AU' => 'Australia',
                        'JP' => 'Japan',
                        'FR' => 'France',
                        'MX' => 'Mexico',
                        'IE' => 'Ireland',
                        'SE' => 'Sweden',
                        'US' => 'United States',
                        'GB' => 'United Kingdom',
                        'DE' => 'Germany',
                        'NL' => 'Netherlands',
                        'IT' => 'Italy',
                        'ES' => 'Spain',
                        'SG' => 'Singapore',
                        'MY' => 'Malaysia',
                        'CN' => 'China',
                        'KR' => 'South Korea',
                        'IN' => 'India',
                        'BR' => 'Brazil',
                        'ZA' => 'South Africa',
                        'NZ' => 'New Zealand',
                        'CA' => 'Canada',
                        'RU' => 'Russia',
                        'AE' => 'UAE',
                        'SA' => 'Saudi Arabia',
                        'TH' => 'Thailand',
                        'PH' => 'Philippines',
                        'VN' => 'Vietnam',
                        'PT' => 'Portugal',
                        'CH' => 'Switzerland',
                    ]),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(null);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}