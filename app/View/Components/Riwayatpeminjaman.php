<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Riwayatpeminjaman extends Component
{
    public $riwayatpeminjaman;
    /**
     * Create a new component instance.
     */
    public function __construct($riwayatpeminjaman)
    {
        $this->riwayatpeminjaman = $riwayatpeminjaman;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.riwayatpeminjaman');
    }
}