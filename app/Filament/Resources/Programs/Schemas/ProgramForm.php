<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;

use Filament\Schemas\Schema;

use Filament\Schemas\Components\Section;

class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Program')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        \Filament\Forms\Components\Select::make('category')
                            ->required()
                            ->options([
                                'sd' => 'SD/MI',
                                'smp' => 'SMP/MTs',
                                'sma' => 'SMA/MA',
                                'all' => 'Semua Kategori',
                            ]),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        TextInput::make('duration')
                            ->required(),
                        TextInput::make('max_students')
                            ->numeric(),
                        Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('subjects')
                            ->columnSpanFull(),
                        Textarea::make('facilities')
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->image()
                            ->directory('program-images')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(5120)
                            ->columnSpanFull(),
                        Toggle::make('is_premium')
                            ->required(),
                        Toggle::make('is_active')
                            ->required(),
                        TextInput::make('order')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }
}
