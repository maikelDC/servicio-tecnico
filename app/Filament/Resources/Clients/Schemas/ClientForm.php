<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->placeholder('Ej: Juan Pérez')
                    ->required()
                    ->maxLength(255),
                TextInput::make('document_id')
                    ->label('Cédula / Rif')
                    ->placeholder('Ej: V-12345678, J-12345678-9, G-12345678-0')
                    ->maxLength(50),
                    TextInput::make('email')
                        ->placeholder('Ej: juan.perez@example.com')
                        ->label('Email address')
                        ->email()
                        ->maxLength(255),
                TextInput::make('phone')
                    ->label('Teléfono')
                    ->placeholder('Ej: +58 412-1234567')
                    ->tel()
                    ->maxLength(20),
                Textarea::make('address')
                ->label('Dirección')
                    ->placeholder('Ej: Calle 123, Ciudad, País')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Textarea::make('notes')
                    ->label('Notas')
                    ->placeholder('Información adicional sobre el cliente')
                    ->columnSpanFull(),
            ]);
    }
}
