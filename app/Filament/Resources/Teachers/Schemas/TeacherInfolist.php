<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TeacherInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            ImageEntry::make('photo_url')
                ->label('Foto')
                ->disk('public')
                ->visibility('public')
                ->size(120)
                ->circular(),
            TextEntry::make('name')->label('Nama')->weight('bold'),
            TextEntry::make('role')->label('Jabatan'),
            TextEntry::make('education')->label('Pendidikan'),
            TextEntry::make('whatsapp')->label('WhatsApp'),
            TextEntry::make('specializations')
                ->label('Spesialisasi')
                ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', $state) : $state),
            IconEntry::make('is_active')->label('Aktif')->boolean(),
            TextEntry::make('sort_order')->label('Urutan'),
            TextEntry::make('bio')->label('Bio'),
            TextEntry::make('description')->label('Deskripsi')->markdown(),
        ]);
    }
}
