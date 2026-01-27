<?php

namespace App\Filament\Resources\Instructors\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InstructorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Profil Instruktur')
                ->schema([
                    ImageEntry::make('photo_url')
                        ->disk('public')
                        ->visibility('public')
                        ->size(120)
                        ->circular(),
                    TextEntry::make('name')->label('Nama')->weight('bold'),
                    TextEntry::make('title')->label('Posisi'),
                    TextEntry::make('subject')->label('Bidang'),
                    TextEntry::make('education')->label('Pendidikan'),
                    TextEntry::make('experience_years')
                        ->label('Pengalaman (tahun)')
                        ->formatStateUsing(fn ($state) => $state . ' th'),
                    IconEntry::make('is_certified')->label('Bersertifikat')->boolean(),
                    IconEntry::make('is_active')->label('Aktif')->boolean(),
                    TextEntry::make('sort_order')->label('Urutan'),
                ])->columns(2),
            Section::make('Deskripsi')
                ->schema([
                    TextEntry::make('description')->label('Deskripsi')->markdown(),
                ]),
        ]);
    }
}
