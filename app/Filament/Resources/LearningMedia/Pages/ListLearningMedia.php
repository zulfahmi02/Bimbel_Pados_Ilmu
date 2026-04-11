<?php

namespace App\Filament\Resources\LearningMedia\Pages;

use App\Filament\Resources\LearningMedia\LearningMediaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLearningMedia extends ListRecords
{
    protected static string $resource = LearningMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
