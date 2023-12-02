<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EditEmployee extends Component
{
    public $employee_id;
    public $name;
    public $username;
    public $email;
    public $address;
    public $phone;
    public $website;
    public $company;

    protected $rules = [
        'name' => 'required|string|max:100',
        'username' => 'required|string|max:30',
        'email' => 'required|string|email|max:300',
        'address' => 'string|max:200',
        'phone' => 'string',
        'website' => 'string|max:250',
        'company' => 'string|max:250',
    ];

    public function mount(Employee $employee)
    {
        $this->employee_id = $employee->id;
        $this->name = $employee->name;
        $this->username = $employee->username;
        $this->email = $employee->email;
        $this->address = $employee->address;
        $this->phone = $employee->phone;
        $this->website = $employee->website;
        $this->company = $employee->company;
    }

    public function editarEmpleado()
    {
    
        $data = $this->validate();

        // Encontrar la employee
        $employee = Employee::find($this->employee_id);

        $employee->name = $data['name'];
        $employee->username = $data['username'];
        $employee->email = $data['email'];
        $employee->address = $data['address'];
        $employee->phone = $data['phone'];
        $employee->website = $data['website'];
        $employee->company = $data['company'];

        $employee->save();

        session()->flash('msg','The employee was update successfully');

        return redirect()->route('employees.index');
    }

    public function render()
    {
        return view('livewire.edit-employee');
    }
}
