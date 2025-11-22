<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationGroup = 'Bookings';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('client_id')
                //     ->relationship('client', 'name')
                //     ->required(),
                // Forms\Components\Select::make('service_id')
                //     ->relationship('service', 'name')
                //     ->required(),
                // Forms\Components\Select::make('package_id')
                //     ->relationship('package', 'name')
                //     ->required(),
                // Forms\Components\DatePicker::make('event_date')
                //     ->required(),
                // Forms\Components\TextInput::make('paid_amount')
                //     ->required()
                //     ->numeric(),
                // Forms\Components\TextInput::make('remaining_amount')
                //     ->required()
                //     ->numeric(),
                // Forms\Components\TextInput::make('total_price')
                //     ->required()
                //     ->numeric(),
                // Forms\Components\Select::make('payment_stage')
                //     ->options(['down_payment' => 'down_payment', 'full_payment' => 'full_payment'])
                //     ->default('down_payment')
                //     ->required(),
                Forms\Components\MarkdownEditor::make('notes')
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options(['pending' => 'pending', 'new' => 'new', 'confirmed' => 'confirmed', 'completed' => 'completed', 'canceled' => 'canceled'])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reference_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('client.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('package.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paid_amount')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('remaining_amount')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_stage'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make()->schema([
                TextEntry::make('reference_number'),
                TextEntry::make('client.name'),
                TextEntry::make('service.name'),
                TextEntry::make('package.name'),
                TextEntry::make('event_date'),
                TextEntry::make('paid_amount')->money(),
                TextEntry::make('remaining_amount')->money(),
                TextEntry::make('total_price')->money(),
                TextEntry::make('payment_stage'),
                TextEntry::make('status'),
                TextEntry::make('created_at'),
                TextEntry::make('updated_at'),
                TextEntry::make('notes')
                    ->columnSpanFull(),
            ])->columns(2)
        ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\FeaturesRelationManager::class,
            RelationManagers\MeetingRelationManager::class,
            RelationManagers\AnswersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'view'   => Pages\ViewBooking::route('/{record}'),
            'edit'   => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }
}
