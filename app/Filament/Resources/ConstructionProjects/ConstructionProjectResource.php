<?php

namespace App\Filament\Resources\ConstructionProjects;

use App\Filament\Resources\ConstructionProjects\Pages;
use App\Models\Project;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConstructionProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $modelLabel = 'Construction';           // tambah ini
    protected static ?string $pluralModelLabel = 'Construction';
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Construction';
    protected static \UnitEnum|string|null $navigationGroup = 'Konten';
    protected static ?int $navigationSort = 2;

    // Hanya tampilkan kapal dalam konstruksi
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('is_under_construction', true);
    }

    public static function form(Schema $form): Schema
    {
        return $form->schema([

            Hidden::make('is_under_construction')->default(true),

            Section::make('Informasi Dasar')
                ->description('Nama dan tipe kapal yang sedang dibangun')
                ->schema([
                    TextInput::make('name')->label('Nama Pemilik')->required()->columnSpanFull(),
                    TextInput::make('year')->label('Tahun Mulai Konstruksi')->numeric()->required(),
                    TextInput::make('type')->label('Tipe Kapal')->placeholder('Luxury Pinisi Yacht'),
                ])->columns(2),

            Section::make('Deskripsi')
                ->schema([
                    Textarea::make('description')->label('Deskripsi')->rows(5)->columnSpanFull(),
                ]),

            Section::make('Spesifikasi Teknis')
                ->schema([
                    TextInput::make('length')->label('Panjang (m)')->numeric()->suffix('meter'),
                    TextInput::make('beam')->label('Lebar (m)')->numeric()->suffix('meter'),
                    TextInput::make('build_time')->label('Estimasi Waktu Bangun')->numeric()->suffix('bulan'),
                    TextInput::make('guest_capacity')->label('Kapasitas Tamu')->numeric()->suffix('orang'),
                    TextInput::make('cabin_count')->label('Jumlah Kabin')->numeric()->suffix('kabin'),
                    TextInput::make('cruise_speed')->label('Kecepatan Jelajah')->numeric()->suffix('knots'),
                ])->columns(2),

            Section::make('Status Konstruksi')
                ->icon('heroicon-o-wrench-screwdriver')
                ->description('Tahap dan progress pembangunan saat ini')
                ->schema([
                    Select::make('construction_stage')
                        ->label('Tahap Konstruksi Saat Ini')
                        ->options([
                            'design'    => 'Design',
                            'keel'      => 'Keel Laying',
                            'hull'      => 'Hull Framing',
                            'fitout'    => 'Deck & Fit-out',
                            'finishing' => 'Finishing',
                        ])->required(),

                    TextInput::make('progress_percentage')
                        ->label('Progress (%)')
                        ->numeric()->minValue(0)->maxValue(100)
                        ->suffix('%')->helperText('0 – 100')->required(),

                    DatePicker::make('estimated_launch_date')
                        ->label('Estimasi Tanggal Peluncuran')
                        ->displayFormat('M Y')->required(),

                    TextInput::make('sort_order')
                        ->label('Urutan Tampil')
                        ->numeric()->default(0),

                    FileUpload::make('construction_cover')
                        ->label('Cover Konstruksi')
                        ->helperText('Foto utama card konstruksi di halaman collection')
                        ->image()->disk('public')->imagePreviewHeight('200')
                        ->directory('projects/construction-covers')->columnSpanFull(),

                    FileUpload::make('progress_photos')
                        ->label('Foto Progress')
                        ->helperText('Maks 10 foto — ditampilkan di galeri halaman konstruksi')
                        ->image()->multiple()->reorderable()->maxFiles(10)
                        ->disk('public')->imagePreviewHeight('150')
                        ->directory('projects/construction')->columnSpanFull(),

                ])->columns(2),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')->label('Urutan')->sortable(),
                Tables\Columns\ImageColumn::make('construction_cover')->label('Cover'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('construction_stage')->label('Stage'),
                Tables\Columns\TextColumn::make('progress_percentage')
                    ->label('Progress')
                    ->formatStateUsing(fn($state) => $state . '%'),
                Tables\Columns\TextColumn::make('estimated_launch_date')
                    ->label('Est. Launch')->date('M Y'),
            ])
            ->defaultSort('sort_order')
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
            'index'  => Pages\ListConstructionProjects::route('/'),
            'create' => Pages\CreateConstructionProject::route('/create'),
            'edit'   => Pages\EditConstructionProject::route('/{record}/edit'),
        ];
    }
}