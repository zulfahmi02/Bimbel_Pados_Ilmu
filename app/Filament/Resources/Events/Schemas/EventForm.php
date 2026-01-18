<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('event_date')
                    ->required(),
                TimePicker::make('event_time'),
                TextInput::make('event_duration_days')
                    ->label('Durasi Event (Hari)')
                    ->numeric()
                    ->default(1)
                    ->minValue(1)
                    ->required()
                    ->helperText('Berapa hari event ini akan berlangsung'),
                TextInput::make('location'),
                TextInput::make('whatsapp_contact')
                    ->label('Nomor WhatsApp Narahubung')
                    ->placeholder('6281234567890')
                    ->helperText('Masukkan nomor WhatsApp dengan kode negara (tanpa + atau spasi). Contoh: 6281234567890. Kosongkan untuk menggunakan nomor default.')
                    ->tel()
                    ->minLength(10)
                    ->maxLength(20),
                FileUpload::make('image')
                    ->image()
                    ->directory('event-images')
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(5120),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
