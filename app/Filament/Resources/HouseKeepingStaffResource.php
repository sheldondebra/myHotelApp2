<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HouseKeepingStaffResource\Pages;
use App\Filament\Resources\HouseKeepingStaffResource\RelationManagers;
use App\Models\HouseKeepingStaff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HouseKeepingStaffResource extends Resource
{
    protected static ?string $model = HouseKeepingStaff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('staff_name')
                    ->relationship('staff','name')
                    ->required(),
                Forms\Components\TextInput::make('task_title')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('task_description')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('date_assigned'),
                Forms\Components\DatePicker::make('Estimated_time'),
                Forms\Components\TextInput::make('priority')
                    ->options([
                        'Low' => 'Low',
                        'Medium' => 'Medium',
                        'High' => 'High',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'In Progress' => 'In Progress',
                        'On Hold' => 'On Hold',
                        'Completed' => 'Completed',
                    ])
                    ->required(),
                Forms\Components\Select::make('room_id')
                    ->relationship()
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('remarks')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff_name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('task_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('task_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_assigned')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Estimated_time')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('priority'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('room_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('remarks')
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListHouseKeepingStaff::route('/'),
            'create' => Pages\CreateHouseKeepingStaff::route('/create'),
            'edit' => Pages\EditHouseKeepingStaff::route('/{record}/edit'),
        ];
    }
}
