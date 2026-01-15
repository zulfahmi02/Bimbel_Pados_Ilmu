<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Recent Activity
        </x-slot>

        @php
            $colorStyles = [
                'success' => [
                    'bg' => 'bg-emerald-500/10',
                    'ring' => 'ring-emerald-500/20',
                    'text' => 'text-emerald-500',
                ],
                'info' => [
                    'bg' => 'bg-blue-500/10',
                    'ring' => 'ring-blue-500/20',
                    'text' => 'text-blue-500',
                ],
                'warning' => [
                    'bg' => 'bg-amber-500/10',
                    'ring' => 'ring-amber-500/20',
                    'text' => 'text-amber-500',
                ],
                'primary' => [
                    'bg' => 'bg-purple-500/10',
                    'ring' => 'ring-purple-500/20',
                    'text' => 'text-purple-500',
                ],
            ];
        @endphp

        <div class="rounded-xl ring-1 ring-gray-950/5 dark:ring-white/10 overflow-hidden">
            <div class="divide-y divide-gray-950/5 dark:divide-white/10">
                @forelse($this->getActivities() as $activity)
                    @php
                        $style = $colorStyles[$activity['color'] ?? 'primary'] ?? $colorStyles['primary'];
                    @endphp

                    <div class="group flex items-start gap-4 p-4 hover:bg-gray-500/5 dark:hover:bg-white/5 transition">
                        <div class="flex-shrink-0">
                            <div class="w-11 h-11 rounded-xl ring-1 {{ $style['ring'] }} {{ $style['bg'] }} flex items-center justify-center">
                                <x-filament::icon :icon="$activity['icon']" class="w-5 h-5 {{ $style['text'] }}" />
                            </div>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-4">
                                <p class="text-sm font-semibold text-gray-950 dark:text-white">
                                    {{ $activity['title'] }}
                                </p>
                                <span class="shrink-0 text-xs text-gray-500 dark:text-gray-400">
                                    {{ $activity['time'] }}
                                </span>
                            </div>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 line-clamp-2">
                                {{ $activity['description'] }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Belum ada aktivitas terbaru.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
