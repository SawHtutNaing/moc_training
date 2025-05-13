<?php

namespace App\Livewire;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Teacher;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class TeacherManagement extends Component
{
    use WithPagination;
  

    public $teacherId = null;
    public $showModal = false;
    public $refreshKey = 0; // Used to force UI refresh

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|string|max:255')]
    public $position = '';

    #[Validate('required|string|max:255')]
    public $organization = '';

    #[Validate('required|date')]
    public $dob = '';

    #[Validate('required|in:1,2,3')]
    public $gender = '';

    #[Validate('required|string|max:50')]
    public $nrc = '';

    #[Validate('required|string|max:20')]
    public $phone = '';

    #[Validate('required|email|max:255')]
    public $email = '';

    #[Validate('required|string|max:500')]
    public $address = '';


    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function save()
    {
        $this->validate();

        
            $data = [
                'name' => $this->name,
                'position' => $this->position,
                'organization' => $this->organization,
                'dob' => $this->dob,
                'gender' => $this->gender,
                'nrc' => $this->nrc,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
            ];
    
        $msg = $this->teacherId ? 'Teacher updated successfully!' : 'Teacher created successfully!';
        if ($this->teacherId) {
            // Update existing teacher

            $teacher = Teacher::findOrFail($this->teacherId);
            $teacher->update($data);
        } else {
            // Create new teacher
            Teacher::create($data);
        }

        $this->closeModal();
        $this->resetPage(); // Reset to first page after save
        $this->refreshKey = rand(1000, 9999); // Force UI refresh

        $this->dispatch('notify', message: $msg);
    }

    #[On('edit-teacher')]
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->teacherId = $teacher->id;
        $this->name = $teacher->name;
        $this->position = $teacher->position;
        $this->organization = $teacher->organization;
        $this->dob = $teacher->dob;
        $this->gender = $teacher->gender;
        $this->nrc = $teacher->nrc;
        $this->phone = $teacher->phone;
        $this->email = $teacher->email;
        $this->address = $teacher->address;
        $this->showModal = true;
    }

    #[On('delete-teacher')]
    public function delete($id)
    {
        Teacher::findOrFail($id)->delete();
        $this->resetPage(); // Reset to first page after delete
        $this->refreshKey = rand(1000, 9999); // Force UI refresh
        $this->dispatch('notify', message: 'Teacher deleted successfully!');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->position = '';
        $this->organization = '';
        $this->dob = '';
        $this->gender = '';
        $this->nrc = '';
        $this->phone = '';
        $this->email = '';
        $this->address = '';
        $this->resetValidation();
    }


public function export(): StreamedResponse
{
    $filename = 'teachers_' . now()->format('Y-m-d_H-i-s') . '.csv';

    return response()->streamDownload(function () {
        $handle = fopen('php://output', 'w');
        // CSV headers
        fputcsv($handle, ['ID', 'Name', 'Position', 'Organization', 'DOB', 'Gender', 'NRC', 'Phone', 'Email', 'Address']);

        // Data rows
        Teacher::cursor()->each(function ($teacher) use ($handle) {
            fputcsv($handle, [
                $teacher->id,
                $teacher->name,
                $teacher->position,
                $teacher->organization,
                $teacher->dob,
                $teacher->gender,
                $teacher->nrc,
                $teacher->phone,
                $teacher->email,
                $teacher->address,
            ]);
        });

        fclose($handle);
    }, $filename);
}

    public function render()
    {
        $teachers = Teacher::paginate(5);
        $data = $teachers->items();
        return view('livewire.teacher-management', compact('teachers', 'data'));
    }
}



