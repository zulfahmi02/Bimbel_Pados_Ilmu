<?php

namespace App\Filament\Resources\Statistics\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StatisticForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Statistik')
                    ->schema([
                        TextInput::make('label')
                            ->label('Label')
                            ->placeholder('Contoh: Siswa Aktif')
                            ->required(),
                        TextInput::make('value')
                            ->label('Nilai/Angka')
                            ->placeholder('Contoh: 200+')
                            ->required(),
                        TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }
}
