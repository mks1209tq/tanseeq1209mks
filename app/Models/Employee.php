<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_code',
        'full_name',
        'date_of_birth',
        'hire_date',
        'termination_date',
        'salutation',
        'status',
        'employee_status',
        'company',
        'gender',
        'sponsor',
        'nationality',
        'category',
        'department',
        'religion',
        'physically_challenged',
        'division',
        'designation',
        'company_transportation',
        'medical_insurance',
        'salary_transfer_letter',
        'cost_head',
        'entity',
        'line_manager_1',
        'line_manager_2',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_of_birth' => 'date:d/m/Y',
        'hire_date' => 'timestamp',
        'termination_date' => 'timestamp',
    ];

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
