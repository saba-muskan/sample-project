<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    protected $connection = 'mysql';
  
    protected $table = 'employeesalary';
    protected $fillable = [
        'employee_id',    
        'month',    
        'year',    
        'basic_pay',    
        'House_Allowance',    
        'Medical_Allownace',    
        'Transport_Allownace', 
        'Gross_Pay',
        'Cp_Fund',
        'Medical_Contribution',
        'Income_Tax',
        'Total_Deduction',
        'Net_Pay',
    ];
}
