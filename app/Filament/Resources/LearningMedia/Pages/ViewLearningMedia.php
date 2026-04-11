<?php

namespace App\Filament\Resources\LearningMedia\Pages;

use App\Filament\Resources\LearningMedia\LearningMediaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLearningMedia extends ViewRecord
{
    protected static string $resource = LearningMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
