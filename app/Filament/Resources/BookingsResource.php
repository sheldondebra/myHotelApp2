<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingsResource\Pages;
use App\Filament\Resources\BookingsResource\RelationManagers;
use App\Models\Bookings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingsResource extends Resource
{
    protected static ?string $model = Bookings::class;

    protected static ?string $navigationGroup = 'Reservations';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('guests_id')
                    ->relationship('guests', 'first_name')
                    ->required(),
                Forms\Components\DatePicker::make('check_in_date')
                    ->required(),
                Forms\Components\DatePicker::make('check_out_date')
                    ->required(),
                Forms\Components\TextInput::make('room_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('services_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total_amount')
                    ->disabled()
                    ->prefix('GHS')
                    ->required()
                    ->numeric(),
                //calculate the number of night from the check_in_date and check_out_date
                Forms\Components\TextInput::make('number_of_nights')
                    ->disabled()
                    ->numeric()
            ->afterStateUpdated(function (Form $form, $state) {
                $check_in_date = $state['check_in_date'];
                $check_out_date = $state['check_out_date'];
                $room_id = $state['room_id'];
                $services_id = $state['services_id'];
                $total_amount = $state['total_amount'];
                $number_of_nights = $state['number_of_nights'];
                $room_type_id = $state['room_type_id'];
                $occupancy = $state['occupancy'];
                $price = $state['price'];
                $quantity = $state['quantity'];
                $total_amount = $number_of_nights * $price * $quantity;
                $form
                    ->getState()
                    ->set('total_amount', $total_amount);


            })
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('guests_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('check_in_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('check_out_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('room_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('services_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBookings::route('/create'),
            'edit' => Pages\EditBookings::route('/{record}/edit'),
        ];
    }
}
