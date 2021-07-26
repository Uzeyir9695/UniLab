<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class StudentsImport implements ToModel,
                                WithMultipleSheets,
                                WithHeadingRow,
                                WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name' => $row['name'],
            'surname' => $row['surname'],
            'email' => $row['email'],
            'password' => hash::make($row['password'])
        ]);
    }

    public function sheets(): array
    {
        return [
            0 => new self(),
        ];
    }

    public function rules(): array
    {
        return [
             '*.email' => ['email', 'unique:students'],
             '*.surname'   => ['string', 'min:2'],
             '*.name'   => ['string', 'min:2'],
             '*.password'   => ['min:6']
        ];
    }
}
