<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\EmployeesRequest;

class EmployeesController extends Controller
{
    protected $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function getEmployeesApi()
    {
        try {
            //code...

            $response = $this->httpClient->get('/users');

            // el segundo argumento es un parámetro opcional llamado assoc que determina si el resultado se debe devolver como un array asociativo (true) o como un objeto estándar (false o por defecto).
            $employees = json_decode($response->getBody(), true);

            foreach ($employees as $employee) {

                // verificar si el empleado existe
                // $emp = Employee::where('email', $employee['email'])->first();


                $emp = Employee::withTrashed()->find($employee["id"]);

                // Si encuentra es porque ya existe. No debe cargar de nuevo.
                if (!isset($emp)) {

                    // Recorro el array de address dejando atras el indice "geo"
                    $address_array = array_slice($employee['address'], 0, 3);

                    // Usar la función implode para concatenar los elementos de cada array con un 
                    $address = implode(" - ", $address_array);
                    $company = implode(" - ", $employee['company']);

                    // Creo una instancia de Employee
                    Employee::create([
                        'id' => $employee["id"],
                        'name' => $employee['name'],
                        'username' => $employee['username'],
                        'email' => $employee['email'],
                        'address' => $address,
                        'phone' => $employee['phone'],
                        'website' => $employee['website'],
                        'company' => $company
                    ]);
                }
            }

            session()->flash('msg', 'The list of employees was loaded successfully');
            return  redirect()->route('employees.index');
        } catch (\Throwable $th) {

            Log::error($th);
            return response()->json(['error' => $th->getMessage()], $th->getCode());
        }
    }


    public function index()
    {
        return view('employees.index');
    }


    public function edit(Employee $employee)
    {
        try {
            return view('employees.edit', ['employee' => $employee]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['error' => $th->getMessage()], $th->getCode());
        }
    }
}
