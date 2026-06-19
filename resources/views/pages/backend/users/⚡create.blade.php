<?php

use Livewire\Component;

use Mary\Traits\Toast;

use App\Models\User;

use Livewire\Attributes\Validate;

new class extends Component
{
    use Toast;

    #[Validate('required')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public function createUser(){

        $validated = $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->success('User Created');

        $this->reset();

        return redirect()->back();

    }
};
?>

<div>
    <x-form wire:submit="createUser" >
        <x-input wire:model="name" label="name" />
        <x-input type="email"  wire:model="email" label="Email Address" />
        <x-input type="password" wire:model="password" label="Password" />
        <x-button type="submit" label="Submit" />
    </x-form>
</div>
