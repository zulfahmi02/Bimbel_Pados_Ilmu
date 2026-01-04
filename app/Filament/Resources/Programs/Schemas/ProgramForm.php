<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;

class ProgramForm
{
    public static function schema(): array
    {
        return [
            TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),
            Select::make('category')
                ->required()
                ->options([
                    'sd' => 'SD/MI',
                    'smp' => 'SMP/MTs',
                    'sma' => 'SMA/MA',
                    'all' => 'Semua Kategori',
                ])
                ->native(false),
            Textarea::make('description')
                ->required()
                ->columnSpanFull(),
            Textarea::make('subjects')
                ->columnSpanFull(),
            Textarea::make('facilities')
                ->columnSpanFull(),
            TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('$'),
            TextInput::make('duration')
                ->required(),
            TextInput::make('max_students')
                ->numeric(),
            FileUpload::make('image')
                ->image()
                ->directory('program-images')
                ->disk('public')
                ->visibility('public')
                ->maxSize(5120),
            Toggle::make('is_premium')
                ->required(),
            Toggle::make('is_active')
                ->required(),
            TextInput::make('order')
                ->required()
                ->numeric()
                ->default(0),
        ];
    }
}
