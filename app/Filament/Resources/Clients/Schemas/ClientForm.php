<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;


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
                    ->label('Correo electrónico')
                    ->email()
                    ->maxLength(255),
                PhoneInput::make('phone')
                    ->label('Teléfono')
                    ->placeholder('Ej: 412-1234567')
                    ->defaultCountry('VE')
                    ->countryOrder(['VE', 'US', 'CO', 'AR'])
                    ->strictMode()
                    ->validateFor(type: 'mobile')
                    ->displayNumberFormat(PhoneInputNumberType::E164)
                    ->inputNumberFormat(PhoneInputNumberType::E164)
                    ->extraInputAttributes([
                        'inputmode' => 'numeric',
                        'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 43 || event.charCode === 32',
                    ])

                    ->unique(ignoreRecord: true)
                    ->required(),


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
