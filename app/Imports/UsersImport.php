<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithStartRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'password_uncrypt' => $row[1],
            'password' => bcrypt($row[1]),
            'depart' => $row[2],
            'serial' => $row[3],
        ]);
    }

    // 從2行開始讀取資料
    public function startRow(): int
    {
        return 2;
    }

    // 驗證
    public function rules(): array
    {
        return [
            '0' => 'required|unique:users,name',
            '1' => 'required',
            '2' => 'required',
        ];
    }
}
