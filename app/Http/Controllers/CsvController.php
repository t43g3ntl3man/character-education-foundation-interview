<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Writer;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\EmployeeCrud;

class CsvController extends Controller
{
    public function exportCsv(){
        $employees = EmployeeCrud::all();

        // Prepare the CSV header row
        $header = ['id', 'name', 'f_name', 'cnic', 'dob', 'address', 'experience', 'profile_picture', 'status'];

        // Initialize the CSV writer
        $csv = Writer::createFromString('');

        // Insert the header row into the CSV
        $csv->insertOne($header);

        // Insert the data rows into the CSV
        foreach ($employees as $employee) {
            $row = [
                $employee->id,
                $employee->name,
                $employee->f_name,
                $employee->cnic,
                $employee->dob,
                $employee->address,
                $employee->experience,
                $employee->profile_picture,
                $employee->status,
            ];

            $csv->insertOne($row);
        }

        // Prepare the response with CSV headers
        $response = new StreamedResponse(function () use ($csv) {
            echo $csv->getContent();
        }, 200);

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="employees.csv"');

        return $response;
    }
}