<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information', [
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->required(),
                Forms\Components\Select::make('gender')
                    //select options for gender
                    ->options([
                        "Male" => "Male",
                        "Female" => "Female",
                    ])
                    ->default(null),
                    ]),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('national_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_contact_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_contact_phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('position')
                    //select options for positions
                    ->options(
                        [
                            "Admin" => "Admin",
                            "Manager" => "Manager",
                            "Employee" => "Employee",
                        ]
                    )
                    ->required(),
                        ]),
                Forms\Components\TextInput::make('department')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_hire')
                    ->required(),
                Forms\Components\TextInput::make('employment_status')
                    ->required(),
                Forms\Components\Select::make('employment_type')
                    ->options([
                        "Full-Time" => "Full-Time",
                        "Part-Time" => "Part-Time",
                        "Contract" => "Contract",
                        "Temporary" => "Temporary",
                    ])
                    ->required(),
                Forms\Components\TextInput::make('shift_schedule')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('salary')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pay_frequency')
                    ->required(),
                Forms\Components\TextInput::make('bank_account')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('benefits_enrollment')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('deductions')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('employment_contract')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('tax_forms')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('work_authorization')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nda_nca_agreement')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('highest_education')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('training_certifications')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('next_performance_review'),
                Forms\Components\Textarea::make('goals_objectives')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('termination_date'),
                Forms\Components\TextInput::make('termination_reason')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('national_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emergency_contact_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emergency_contact_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('department')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_hire')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employment_status'),
                Tables\Columns\TextColumn::make('employment_type'),
                Tables\Columns\TextColumn::make('shift_schedule')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salary')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pay_frequency'),
                Tables\Columns\TextColumn::make('bank_account')
                    ->searchable(),
                Tables\Columns\TextColumn::make('benefits_enrollment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deductions')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employment_contract')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tax_forms')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_authorization')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nda_nca_agreement')
                    ->searchable(),
                Tables\Columns\TextColumn::make('highest_education')
                    ->searchable(),
                Tables\Columns\TextColumn::make('training_certifications')
                    ->searchable(),
                Tables\Columns\TextColumn::make('next_performance_review')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('termination_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('termination_reason')
                    ->searchable(),
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
