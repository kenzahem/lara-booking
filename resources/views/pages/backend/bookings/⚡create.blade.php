<?php

use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\Attributes\Validate;

use App\Models\Booking;

new class extends Component
{
    use Toast;


    #[Validate('required')]
    public $firstname = '';

    #[Validate('required')]
    public $lastname = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $contact_no = '';

    #[Validate('required')]
    public $book_date = '';

    #[Validate('required')]
    public $book_time = '';

    #[Validate('required')]
    public $location = '';

    public function save(){

        $validated = $this->validate();

        Booking::create($validated);
        $this->success('Booking Added!');
        $this->reset();
        return redirect()->back();

    }

};
?>

<div>
    <x-card>
        <x-form wire:submit="save">
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
                <x-button label="Submit" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>

        </x-form>
    </x-card>
</div>
