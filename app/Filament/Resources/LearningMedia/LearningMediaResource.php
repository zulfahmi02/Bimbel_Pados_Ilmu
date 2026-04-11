<?php

namespace App\Filament\Resources\LearningMedia;

use App\Filament\Resources\LearningMedia\Pages\CreateLearningMedia;
use App\Filament\Resources\LearningMedia\Pages\EditLearningMedia;
use App\Filament\Resources\LearningMedia\Pages\ListLearningMedia;
use App\Filament\Resources\LearningMedia\Pages\ViewLearningMedia;
use App\Filament\Resources\LearningMedia\Schemas\LearningMediaForm;
use App\Filament\Resources\LearningMedia\Schemas\LearningMediaInfolist;
use App\Filament\Resources\LearningMedia\Tables\LearningMediaTable;
use App\Models\LearningMedia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class LearningMediaResource extends Resource
{
    protected static ?string $model = LearningMedia::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Media Pembelajaran';

    protected static ?string $modelLabel = 'Media Pembelajaran';

    protected static ?string $pluralModelLabel = 'Media Pembelajaran';

    protected static \UnitEnum|string|null $navigationGroup = 'Konten Website';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return LearningMediaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LearningMediaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LearningMediaTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLearningMedia::route('/'),
            'create' => CreateLearningMedia::route('/create'),
            'view' => ViewLearningMedia::route('/{record}'),
            'edit' => EditLearningMedia::route('/{record}/edit'),
        ];
    }
}
