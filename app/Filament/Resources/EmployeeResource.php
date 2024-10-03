<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Carbon\Carbon;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('employee_code')
                    ->required(),
                Forms\Components\TextInput::make('full_name'),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->format('d/m/Y')
                    ->displayFormat('d/m/Y')
                    ->dehydrateStateUsing(fn ($state) => $state ? Carbon::createFromFormat('d/m/Y', $state)->format('Y-m-d') : null)
                    ->hydrateStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d/m/Y') : null),
                Forms\Components\DateTimePicker::make('hire_date'),
                Forms\Components\DateTimePicker::make('termination_date'),
                Forms\Components\TextInput::make('salutation'),
                Forms\Components\TextInput::make('status'),
                Forms\Components\TextInput::make('employee_status'),
                Forms\Components\TextInput::make('company')
                    ->required(),
                Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('sponsor'),
                Forms\Components\TextInput::make('nationality'),
                Forms\Components\TextInput::make('category'),
                Forms\Components\TextInput::make('department'),
                Forms\Components\TextInput::make('religion'),
                Forms\Components\TextInput::make('physically_challenged'),
                Forms\Components\TextInput::make('division'),
                Forms\Components\TextInput::make('designation'),
                Forms\Components\TextInput::make('company_transportation'),
                Forms\Components\TextInput::make('medical_insurance'),
                Forms\Components\TextInput::make('salary_transfer_letter'),
                Forms\Components\TextInput::make('cost_head'),
                Forms\Components\TextInput::make('entity'),
                Forms\Components\TextInput::make('line_manager_1'),
                Forms\Components\TextInput::make('line_manager_2'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('date_of_birth')
                //     ->date()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('hire_date')
                //     ->date('d/m/Y')
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('termination_date')
                //     ->date('d/m/Y')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('salutation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employee_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sponsor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nationality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('department')
                    ->searchable(),
                Tables\Columns\TextColumn::make('religion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('physically_challenged')
                    ->searchable(),
                Tables\Columns\TextColumn::make('division')
                    ->searchable(),
                Tables\Columns\TextColumn::make('designation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_transportation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('medical_insurance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salary_transfer_letter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cost_head')
                    ->searchable(),
                Tables\Columns\TextColumn::make('entity')
                    ->searchable(),
                Tables\Columns\TextColumn::make('line_manager_1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('line_manager_2')
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
