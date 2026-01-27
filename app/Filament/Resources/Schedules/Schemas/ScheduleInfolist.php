<?php

namespace App\Filament\Resources\Schedules\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ScheduleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('student_name')
                    ->label('Nama Siswa'),
                TextEntry::make('subject')
                    ->label('Mata Pelajaran'),
                TextEntry::make('day_of_week')
                    ->label('Hari'),
                TextEntry::make('start_time')
                    ->label('Waktu Mulai')
                    ->time(),
                TextEntry::make('end_time')
                    ->label('Waktu Selesai')
                    ->time(),
                TextEntry::make('teacher.name')
                    ->label('Guru'),
                TextEntry::make('teacher.whatsapp')
                    ->label('WhatsApp Guru'),
                IconEntry::make('is_active')
                    ->label('Status')
                    ->boolean(),
                TextEntry::make('notes')
                    ->label('Catatan')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime(),
            ]);
    }
}
