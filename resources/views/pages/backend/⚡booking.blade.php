<?php

use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;

use App\Models\Booking;

new class extends Component
{
    use Toast, WithPagination;

    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'firstname', 'label' => 'First Name'],
            ['key' => 'lastname', 'label' => 'Last Name'],
            ['key' => 'email', 'label' => 'E-mail', 'sortable' => true],
            ['key' => 'contact_no', 'label' => 'Phone Number'],
            ['key' => 'location', 'label' => 'Location'],
        ];
    }

    public function bookings(){
        return Booking::paginate(6);
    }

    public function with(): array
    {
        return [
            'bookings' => $this->bookings(),
            'headers' => $this->headers()
        ];
    }
};
?>

<div>
    <x-header title="Dashboard" subtitle="Booking List" separator />
    <x-table class="border" :headers="$headers" :rows="$bookings" with-pagination >


    {{-- Special `actions` slot --}}
    @scope('actions', $booking)
        <x-button icon="o-trash" wire:click="delete({{ $booking->id }})" spinner class="btn-sm" />
    @endscope

</x-table>
</div>
