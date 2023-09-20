<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserItems extends Component
{
    public $user; // User model

    public function mount($userId)
    {
        $this->user = User::find($userId);
    }

    public function render()
    {
        $listedProducts = $this->user->products; // Assuming a relationship is set up between User and Product models
        $notifications = $this->user->notifications;
        $views = $this->user->views;

        return view('livewire.user-items', compact('listedProducts', 'notifications', 'views'));
    }
}