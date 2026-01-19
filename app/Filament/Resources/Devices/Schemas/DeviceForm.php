<?php

namespace App\Filament\Resources\Devices\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DeviceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('client_id')
                    ->relationship('client', 'name')
                    ->searchable()
                    ->required(),
                Select::make('type_id')
                    ->relationship('type', 'name')
                    ->searchable()
                    ->required(),
                Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->searchable()
                    ->required(),
                TextInput::make('model')
                    ->required()
                    ->maxLength(100),
                TextInput::make('serial')
                    ->maxLength(100),
                TextInput::make('access_password')
                    ->password()
                    ->maxLength(150),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
