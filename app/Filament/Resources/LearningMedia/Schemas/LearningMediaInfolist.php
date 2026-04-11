<?php

namespace App\Filament\Resources\LearningMedia\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LearningMediaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('Judul Produk'),
                TextEntry::make('slug'),
                TextEntry::make('category')
                    ->placeholder('-'),
                TextEntry::make('author')
                    ->label('Penulis')
                    ->placeholder('-'),
                TextEntry::make('publisher')
                    ->label('Penerbit')
                    ->placeholder('-'),
                TextEntry::make('price')
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format((int) $state, 0, ',', '.')),
                TextEntry::make('stock')
                    ->label('Stok')
                    ->placeholder('-'),
                ImageEntry::make('image')
                    ->label('Gambar')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                IconEntry::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                IconEntry::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                TextEntry::make('order')
                    ->label('Urutan'),
            ]);
    }
}
