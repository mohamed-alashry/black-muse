<?php

namespace App\Filament\Resources\BookingResource\RelationManagers;

use App\Models\Feature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FeaturesRelationManager extends RelationManager
{
    protected static string $relationship = 'features';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('price')->money(),
                Tables\Columns\IconColumn::make('is_default')->boolean()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->form(fn(Tables\Actions\AttachAction $action): array => [
                        $action->getRecordSelect()
                            ->reactive()
                            ->afterStateUpdated(function ($set, $state) {
                                if (!$state) return;

                                $feature = Feature::find($state);

                                $set('name', $feature->name ?? '');
                                $set('price', $feature->price ?? 0);
                            }),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->readOnly(),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->readOnly(),
                        Forms\Components\Checkbox::make('is_default')
                            ->default(1),
                    ])
                    ->recordSelectOptionsQuery(
                        fn(Builder $query): Builder => $query->whereRelation('packages', 'packages.id', $this->getOwnerRecord()->package_id)
                    ),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
