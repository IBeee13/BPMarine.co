<?php

namespace App\Filament\Resources\Projects;

use App\Filament\Resources\Projects\Pages;
use App\Models\Project;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Projects';
    protected static \UnitEnum|string|null $navigationGroup = 'Konten';
    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('is_under_construction', false);
    }

    public static function form(Schema $form): Schema
    {
        return $form->schema([

            Section::make('Informasi Dasar')
                ->description('Nama, tahun, dan tipe kapal')
                ->schema([
                    TextInput::make('name')->label('Nama Kapal')->required()->columnSpanFull(),
                    TextInput::make('year')->label('Tahun Pembuatan')->numeric()->required(),
                    TextInput::make('type')->label('Tipe Kapal')->placeholder('Luxury Pinisi Yacht'),
                ])->columns(2),

            Section::make('Deskripsi')
                ->description('Ceritakan tentang kapal ini')
                ->schema([
                    Textarea::make('description')->label('Deskripsi')->rows(6)->columnSpanFull(),
                ]),

            Section::make('Spesifikasi Teknis')
                ->description('Detail ukuran dan kemampuan kapal')
                ->schema([
                    TextInput::make('length')->label('Panjang / Length (m)')->numeric()->suffix('meter'),
                    TextInput::make('beam')->label('Lebar / Beam (m)')->numeric()->suffix('meter'),
                    TextInput::make('deck')->label('Jumlah Deck')->numeric()->suffix('deck'),
                    TextInput::make('sail_count')->label('Jumlah Layar')->numeric()->suffix('layar'),
                    TextInput::make('build_time')->label('Waktu Pembangunan')->numeric()->suffix('bulan'),
                    TextInput::make('guest_capacity')->label('Kapasitas Tamu')->numeric()->suffix('orang'),
                    TextInput::make('cabin_count')->label('Jumlah Kabin')->numeric()->suffix('kabin'),
                    TextInput::make('cruise_speed')->label('Kecepatan Jelajah')->numeric()->suffix('knots'),
                    TextInput::make('max_speed')->label('Kecepatan Maksimum')->numeric()->suffix('knots'),
                    Toggle::make('ensuite')->label('Semua kabin ensuite (kamar mandi pribadi)')->columnSpanFull(),
                ])->columns(2),

            Section::make('Media')
                ->description('Cover image dan gallery foto kapal')
                ->schema([
                    FileUpload::make('cover_image')
                        ->label('Cover Image (Foto Utama)')
                        ->image()->disk('public')->imagePreviewHeight('300')
                        ->directory('projects/covers')->columnSpanFull(),
                    FileUpload::make('gallery_images')
                        ->label('Gallery (Foto Tambahan)')
                        ->image()->multiple()->reorderable()->disk('public')
                        ->imagePreviewHeight('200')->directory('projects/gallery')->columnSpanFull(),
                ]),

            Section::make('Pengaturan Tampilan')
                ->description('Atur urutan tampil di halaman collection')
                ->schema([
                    TextInput::make('sort_order')->label('Urutan')->numeric()->default(0)
                        ->helperText('Angka lebih kecil tampil lebih dulu'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')->label('Urutan')->sortable(),
                Tables\Columns\ImageColumn::make('cover_image')->label('Cover'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('year')->sortable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('guest_capacity')->label('Tamu'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
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
            'index'  => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit'   => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}