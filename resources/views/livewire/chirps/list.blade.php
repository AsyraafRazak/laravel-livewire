<?php

use App\Models\Chirp;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On; 
use Livewire\Volt\Component;

new class extends Component
{
    public Collection $chirps;

    public function mount(): void
    {
        $this->getChirps(); 
    }

    #[On('chirp-created')]
public function getChirps(): void
{
$this->chirps = Chirp::with('user')
->latest()
->get();
}
}; ?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
    @foreach ($chirps as $chirp)
        <div class="p-6 flex space-x-2" wire:key="{{ $chirp->id }}">
            <!-- Avatar or Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01" />
            </svg>

            <!-- Chirp content -->
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-gray-800">{{ $chirp->user->name }}</span>
                        <small class="ml-2 text-sm text-gray-600">
                            {{ $chirp->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
                <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
            </div>
        </div>
    @endforeach
</div>
