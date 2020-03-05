<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    protected $fillable = [
    	'payrolls_id', 'employee_id','salary_amount','bonus_amount','deduction_amount','advance_amount','total_payable', 'entry_by', 'status'
    ]; 
}
