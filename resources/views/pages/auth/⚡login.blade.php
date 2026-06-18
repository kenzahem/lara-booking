<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

use Mary\Traits\Toast;

new class extends Component
{

    use Toast;

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public function loginUser(){

        $creds = $this->validate();

        if(Auth::attempt($creds)){
            return redirect()->intended('/');
        }
            $this->warning('Invalid Credentials');
            return redirect()->back();
    }

    public function render(){
        return $this->view()->layout('layouts.guest');
    }

};
?>

<div>
    <x-card class="w-65 my-50 mx-auto" shadow>
        <x-form wire:submit="loginUser">
            <div class="mb-3">
                <x-input wire:model.live="email" label="Email Address" />
            </div>
            <div class="mb-3">
                <x-input type="password" wire:model="password" label="Password" />
            </div>
            <div class="mb-3">
                <x-button type="submit" label="Login" />
            </div>
        </x-form>
    </x-card>
</div>
