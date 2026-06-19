<?php

use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\Attributes\Validate;

use App\Http\Models\Booking;

new class extends Component
{
    use Toast;

    public Booking $booking;

    #[Validate('required')]
    public $firstname = '';

    #[Validate('required')]
    public $lastname = '';

    #[Validate('required|email|unique:booking, email')]
    public $email = '';

    #[Validate('required')]
    public $contact_no = '';

    #[Validate('required')]
    public $book_date = '';

    #[Validate('required')]
    public $book_time = '';

    #[Validate('required')]
    public $location = '';


    public function mount(){
        $this->fill($this->booking);
    }

    public function update(){
        $validated = $this->validate();

        $this->booking->update($validated)

        $this->success('Booking Updated!');

        return redirect()->back();
    }

};
?>

<div class="my-auto mx-auto py-auto px-auto">
    <x-header title="{{ $booking->lastname }}, {{ $booking->firstname }} " subtitle="Currently Editting Booking" separator />
    <x-card>
        <x-form wire:submit="update">
            <div class="mb-3">
                <x-input label="First Name" wire:model="firstname" wire:model.live.blur="firstname" />
            </div>
            <div class="mb-3">
                <x-input label="Last Name" wire:model="lastname" wire:model.live.blur="lastname" />
            </div>
            <div class="mb-3">
                <x-input label="E-mail Address" wire:model="email" wire:model.live.blur="email"  />
            </div>
            <div class="mb-3">
                <x-input label="Phone Number" wire:model="contact_no" wire:model.live.blur="contact_no" />
            </div>
            <div class="mb-3">
                <x-datetime label="Date" wire:model="book_date" wire:model.live.blur="book_date" />
            </div>
            <div class="mb-3">
                <x-datetime label="Time" wire:model="book_time" wire:model.live.blur="book_time" type="time" inline />
            </div>
            <div class="mb-3">
                <x-input label="Location" wire:model="location" wire:model.live.blur="location" />
            </div>
            <x-slot:actions>
                <x-button type="reset" label="Reset" />
                <x-button label="Submit" class="btn-primary" type="submit" spinner="update" />
            </x-slot:actions>

        </x-form>
    </x-card>
</div>
