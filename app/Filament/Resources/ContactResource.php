<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationGroup = 'Website Content';
    protected static ?int    $navigationSort  = 4;
    protected static ?string $navigationIcon  = 'heroicon-o-envelope';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('notes')
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options(['new' => 'new', 'in-progress' => 'in-progress', 'closed' => 'closed'])
                    ->default('new')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('replied_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('repliedBy.name')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                TextEntry::make('client.name')
                    ->url($infolist->record->client_id ? route('filament.admin.resources.clients.view', $infolist->record->client_id) : null)
                    ->openUrlInNewTab(),
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('subject'),
                TextEntry::make('message'),
                TextEntry::make('status'),
                TextEntry::make('created_at'),
                TextEntry::make('updated_at'),
                TextEntry::make('notes')->markdown()->columnSpanFull(),
            ])->columns(),
            Section::make('Reply')->schema([
                TextEntry::make('repliedBy.name'),
                TextEntry::make('replied_at'),
                TextEntry::make('reply_message')->markdown()->columnSpanFull(),
            ])->columns(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'view'   => Pages\ViewContact::route('/{record}'),
            'edit'   => Pages\EditContact::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;

    }
}
