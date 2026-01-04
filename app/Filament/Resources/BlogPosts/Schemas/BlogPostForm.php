<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BlogPostForm
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
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('excerpt')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('blog-images')
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(5120),
                TextInput::make('author')
                    ->required()
                    ->default('Admin'),
                DateTimePicker::make('published_at')
                    ->default(now()),
                Toggle::make('is_published')
                    ->required()
                    ->default(true),
            ]);
    }
}
