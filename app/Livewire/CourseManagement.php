<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use App\Models\Course;

class CourseManagement extends Component
{
    use WithPagination;

    public $courseId = null;
    public $showModal = false;

    #[Validate('required|string|max:255')]
    public $name = '';

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

        $data = ['name' => $this->name];

        if ($this->courseId) {
            $course = Course::findOrFail($this->courseId);
            $course->update($data);
        } else {
            Course::create($data);
        }

        $this->closeModal();
        $this->dispatch('notify', message: $this->courseId ? 'Course updated successfully!' : 'Course created successfully!');
    }

    #[On('edit-course')]
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $this->courseId = $course->id;
        $this->name = $course->name;
        $this->showModal = true;
    }

    #[On('delete-course')]
    public function delete($id)
    {
        Course::findOrFail($id)->delete();
        $this->dispatch('notify', message: 'Course deleted successfully!');
    }

    public function resetForm()
    {
        $this->courseId = null;
        $this->name = '';
        $this->resetValidation();
    }

    public function render()
    {
        $courses = Course::paginate(5);
        $data = $courses->items();

        return view('livewire.course-management', compact('courses', 'data'));
    }
}
