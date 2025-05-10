<?php

namespace App\Livewire\Dashboard;
use App\Models\Batch;
use Livewire\Component;

class BatchChart extends Component
{
    public array $labels = [];
    public array $dataset = [];

    public function mount()
    {
        
        $batches = Batch::withCount('enrollments')
            ->orderBy('enrollments_count', 'desc')
            ->take(5)
            ->get();

        $this->labels = $batches->pluck('name')->toArray();
        $this->dataset = [
            [
                'label' => 'Enrollments',
                'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                'borderColor' => 'rgba(54, 162, 235, 1)',
                'borderWidth' => 1,
                'data' => $batches->pluck('enrollments_count')->toArray(),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.batch-chart');
    }
}
