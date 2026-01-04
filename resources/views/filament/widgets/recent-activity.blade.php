<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Recent Activity
        </x-slot>

        <div class="space-y-4">
            @foreach($this->getActivities() as $activity)
                <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-gray-500/5 dark:hover:bg-gray-500/10 transition">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center
                                @if($activity['color'] === 'success') bg-green-500/10
                                @elseif($activity['color'] === 'info') bg-blue-500/10
                                @elseif($activity['color'] === 'warning') bg-orange-500/10
                                @elseif($activity['color'] === 'primary') bg-purple-500/10
                                @endif">
                            <x-filament::icon :icon="$activity['icon']" class="w-5 h-5
                                        @if($activity['color'] === 'success') text-green-500
                                        @elseif($activity['color'] === 'info') text-blue-500
                                        @elseif($activity['color'] === 'warning') text-orange-500
                                        @elseif($activity['color'] === 'primary') text-purple-500
                                        @endif" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                            {{ $activity['title'] }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 truncate">
                            {{ $activity['description'] }}
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-xs text-gray-500 dark:text-gray-500">
                            {{ $activity['time'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>