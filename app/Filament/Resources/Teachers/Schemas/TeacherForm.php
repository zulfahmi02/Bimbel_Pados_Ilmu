<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Models\Teacher;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Nama')
                ->required()
                ->maxLength(255),
            Radio::make('role')
                ->label('Jabatan')
                ->options([
                    'Kepala Bimbel' => 'Kepala Bimbel',
                    'Guru/Pengajar' => 'Guru/Pengajar',
                ])
                ->required()
                ->descriptions([
                    'Kepala Bimbel' => 'Hanya boleh satu. Nonaktif jika sudah ada.',
                    'Guru/Pengajar' => 'Pengajar reguler',
                ])
                ->inline(false)
                ->reactive()
                ->disableOptionWhen(function (string $value): bool {
                    return $value === 'Kepala Bimbel'
                        && Teacher::where('role', 'Kepala Bimbel')->exists();
                }),
            TextInput::make('education')
                ->label('Pendidikan')
                ->maxLength(255),
            TextInput::make('whatsapp')
                ->label('WhatsApp')
                ->placeholder('62xxxxxxxxxxx')
                ->maxLength(30),
            FileUpload::make('photo_url')
                ->label('Foto')
                ->image()
                ->directory('teachers')
                ->disk('public')
                ->visibility('public')
                ->maxSize(5120)
                ->imageEditor()
                ->imageEditorAspectRatios(['1:1', '3:4', '4:3']),
            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),
            TextInput::make('sort_order')
                ->label('Urutan')
                ->numeric()
                ->default(0),
            TagsInput::make('specializations')
                ->label('Spesialisasi')
                ->separator(',')
                ->placeholder('Masukkan keahlian, enter untuk menambah'),
            Textarea::make('bio')
                ->label('Bio Singkat')
                ->rows(2),
            Textarea::make('description')
                ->label('Deskripsi Lengkap')
                ->rows(4),
        ]);
    }
}
