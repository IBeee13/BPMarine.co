<?php

namespace App\Filament\Resources\ContactMessages;

use App\Filament\Resources\ContactMessages\Pages;
use App\Models\ContactMessage;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Contact Messages';
    protected static \UnitEnum|string|null $navigationGroup = 'Manajemen';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $form): Schema
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone'),
                Tables\Columns\TextColumn::make('company')
                    ->label('Company'),
                Tables\Columns\TextColumn::make('country')
                    ->label('Country'),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Subject'),
                Tables\Columns\TextColumn::make('message')
                    ->label('Pesan')
                    ->limit(50)  // tampilkan 50 karakter
                    ->tooltip(fn($record) => $record->message), // hover untuk lihat lengkap
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending'  => 'warning',
                        'accepted' => 'success',
                        'rejected' => 'danger',
                        default    => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->recordAction(null)
            ->actions([
                Action::make('accept')
                    ->label('Accept')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->requiresConfirmation()
                    ->modalHeading('Terima Pesan')
                    ->modalDescription('Client akan otomatis ditambahkan ke menu Clients.')
                    ->modalSubmitActionLabel('Ya, Terima')
                    ->visible(fn(ContactMessage $record) => $record->status === 'pending')
                    ->action(fn(ContactMessage $record) => $record->update(['status' => 'accepted'])),

                Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->icon('heroicon-o-x-mark')
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Pesan')
                    ->modalDescription('Apakah kamu yakin ingin menolak pesan ini?')
                    ->modalSubmitActionLabel('Ya, Tolak')
                    ->visible(fn(ContactMessage $record) => $record->status === 'pending')
                    ->action(fn(ContactMessage $record) => $record->update(['status' => 'rejected'])),

                DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\BulkAction::make('bulk_accept')
                        ->label('Accept Terpilih')
                        ->color('success')
                        ->icon('heroicon-o-check')
                        ->requiresConfirmation()
                        ->modalHeading('Terima Pesan Terpilih')
                        ->modalDescription('Semua pesan yang dipilih akan diterima dan client otomatis dibuat.')
                        ->modalSubmitActionLabel('Ya, Terima Semua')
                        ->action(fn(\Illuminate\Database\Eloquent\Collection $records) =>
                            $records->where('status', 'pending')->each->update(['status' => 'accepted'])
                        ),

                    \Filament\Actions\BulkAction::make('bulk_reject')
                        ->label('Reject Terpilih')
                        ->color('danger')
                        ->icon('heroicon-o-x-mark')
                        ->requiresConfirmation()
                        ->modalHeading('Tolak Pesan Terpilih')
                        ->modalDescription('Semua pesan yang dipilih akan ditolak.')
                        ->modalSubmitActionLabel('Ya, Tolak Semua')
                        ->action(fn(\Illuminate\Database\Eloquent\Collection $records) =>
                            $records->where('status', 'pending')->each->update(['status' => 'rejected'])
                        ),

                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
        ];
    }
}