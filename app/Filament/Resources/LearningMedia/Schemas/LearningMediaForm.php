<?php

namespace App\Filament\Resources\LearningMedia\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LearningMediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Produk')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Produk')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('category')
                            ->label('Kategori')
                            ->placeholder('Contoh: Buku Matematika'),
                        TextInput::make('author')
                            ->label('Penulis'),
                        TextInput::make('publisher')
                            ->label('Penerbit'),
                        TextInput::make('price')
                            ->label('Harga')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),
                        TextInput::make('stock')
                            ->label('Stok')
                            ->numeric(),
                        Textarea::make('description')
                            ->label('Deskripsi Lengkap')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->label('Gambar Produk')
                            ->image()
                            ->directory('learning-media')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(5120)
                            ->imageEditor()
                            ->columnSpanFull(),
                        FileUpload::make('gallery_images')
                            ->label('Galeri Produk')
                            ->helperText('Bisa unggah beberapa gambar untuk halaman detail.')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->directory('learning-media')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(5120)
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])->columns(2),
                Section::make('Pengaturan')
                    ->schema([
                        Toggle::make('is_featured')
                            ->label('Produk Unggulan')
                            ->default(false),
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                        TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])->columns(3),
            ]);
    }
}
