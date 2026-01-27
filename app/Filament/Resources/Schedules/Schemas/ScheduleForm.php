<?php

namespace App\Filament\Resources\Schedules\Schemas;

use App\Models\Teacher;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('student_name')
                    ->label('Nama Siswa')
                    ->required()
                    ->maxLength(255),
                TextInput::make('subject')
                    ->label('Mata Pelajaran')
                    ->required()
                    ->maxLength(255),
                Select::make('day_of_week')
                    ->label('Hari')
                    ->options([
                        'Senin' => 'Senin',
                        'Selasa' => 'Selasa',
                        'Rabu' => 'Rabu',
                        'Kamis' => 'Kamis',
                        'Jumat' => 'Jumat',
                        'Sabtu' => 'Sabtu',
                        'Minggu' => 'Minggu',
                    ])
                    ->required(),
                TimePicker::make('start_time')
                    ->label('Waktu Mulai')
                    ->required()
                    ->seconds(false),
                TimePicker::make('end_time')
                    ->label('Waktu Selesai')
                    ->required()
                    ->seconds(false),
                Select::make('teacher_id')
                    ->label('Guru')
                    ->relationship('teacher', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                Textarea::make('notes')
                    ->label('Catatan')
                    ->columnSpanFull(),
            ]);
    }
}
