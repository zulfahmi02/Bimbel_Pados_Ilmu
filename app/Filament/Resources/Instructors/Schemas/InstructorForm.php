<?php

namespace App\Filament\Resources\Instructors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class InstructorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Nama')
                ->required()
                ->maxLength(255),
            TextInput::make('title')
                ->label('Jabatan / Posisi')
                ->required()
                ->maxLength(255),
            TextInput::make('subject')
                ->label('Bidang')
                ->required()
                ->maxLength(255),
            TextInput::make('education')
                ->label('Pendidikan')
                ->maxLength(255),
            TextInput::make('experience_years')
                ->label('Pengalaman (tahun)')
                ->numeric()
                ->default(0),
            FileUpload::make('photo_url')
                ->label('Foto')
                ->image()
                ->directory('instructors')
                ->disk('public')
                ->visibility('public')
                ->maxSize(5120)
                ->imageEditor()
                ->imageEditorAspectRatios(['1:1', '3:4', '4:3']),
            Toggle::make('is_certified')
                ->label('Bersertifikat')
                ->default(false),
            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),
            TextInput::make('sort_order')
                ->label('Urutan')
                ->numeric()
                ->default(0),
            Textarea::make('description')
                ->label('Deskripsi')
                ->rows(4),
        ]);
    }
}
