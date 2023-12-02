<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class ListEmployees extends Component
{
    protected $listeners = ['deleteEmployee'];
    use WithPagination;
    
    public function deleteEmployee(Employee $employee)
    {
        $employee->delete();
    }

    public function render()
    {
        $employees = Employee::paginate(4);
        return view('livewire.list-employees', compact('employees'));
    }
}
