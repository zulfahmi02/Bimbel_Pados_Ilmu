<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section; // Schemas namespace for Section
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Testimoni')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('role')
                            ->label('Status/Jabatan')
                            ->placeholder('Contoh: Siswa SMA Kelas 12')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('rating')
                            ->label('Rating (1-5)')
                            ->numeric()
                            ->default(5)
                            ->minValue(1)
                            ->maxValue(5)
                            ->required(),
                        FileUpload::make('image')
                            ->label('Foto Profil')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('testimonials')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Textarea::make('content')
                            ->label('Isi Testimoni')
                            ->required()
                            ->columnSpanFull()
                            ->rows(4),
                    ])->columns(2),

                Section::make('Pengaturan')
                    ->schema([
                        TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])->columns(2),
            ]);
    }
}
