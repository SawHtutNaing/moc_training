<?php

namespace App\Livewire;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class StudentManagement extends Component
{
    use WithPagination;

    public $studentId = null;
    public $showModal = false;
    public $refreshKey = 0; // Used to force UI refresh

    #[Validate('required|string|max:255')]
    public $name = '';

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
            'dob' => $this->dob,
            'gender' => $this->gender,
            'nrc' => $this->nrc,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
        ];
        $msg = $this->studentId ? 'Student updated successfully!' : 'Student created successfully!';
        if ($this->studentId) {
            // Update existing student

            $student = Student::findOrFail($this->studentId);
            $student->update($data);
        } else {
            // Create new student
            Student::create($data);
        }

        $this->closeModal();
        $this->resetPage(); // Reset to first page after save
        $this->refreshKey = rand(1000, 9999); // Force UI refresh

        $this->dispatch('notify', message: $msg);
    }

    #[On('edit-student')]
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->studentId = $student->id;
        $this->name = $student->name;
        $this->dob = $student->dob;
        $this->gender = $student->gender;
        $this->nrc = $student->nrc;
        $this->phone = $student->phone;
        $this->email = $student->email;
        $this->address = $student->address;
        $this->showModal = true;
    }

    #[On('delete-student')]
    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        $this->resetPage(); // Reset to first page after delete
        $this->refreshKey = rand(1000, 9999); // Force UI refresh
        $this->dispatch('notify', message: 'Student deleted successfully!');
    }

    public function resetForm()
    {
        $this->studentId = null;
        $this->name = '';
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
    // 👇 customise the file name if you like
    $filename = 'students_' . now()->format('Y-m-d_H-i-s') . '.csv';

    return response()->streamDownload(function () {
        $handle = fopen('php://output', 'w');

        // ---- CSV header row --------------------------------------------------
        fputcsv($handle, [
            'ID',
            'Name',
            'Date of Birth',
            'Gender',
            'NRC',
            'Phone',
            'Email',
            'Address',
        ]);

        // ---- Data rows -------------------------------------------------------
        Student::cursor()->each(function (Student $student) use ($handle) {
            fputcsv($handle, [
                $student->id,
                $student->name,
                $student->dob,
                // If you have getGenderLabelAttribute, you can use $student->gender_label
                $student->gender,
                $student->nrc,
                $student->phone,
                $student->email,
                $student->address,
            ]);
        });

        fclose($handle);
    }, $filename);
}

    public function render()
    {
        $students = Student::paginate(10);
        $data = $students->items();
        return view('livewire.student-management', compact('students', 'data'));
    }
}



