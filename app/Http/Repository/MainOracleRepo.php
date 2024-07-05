<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;


// MainOracleRepo Class Contain All function thats deal with DB
class MainOracleRepo
{

    // getEvaluationList Funtion To Get Evaluation list from DB
    public function getEvaluationList($employee_number)
    {
        return DB::select("select sshr_emp_evaluation. eval_mgr_pending_trxns ($employee_number) from dual");
    }

    // getSectionList Funtion To Get Sections list from DB
    public function getSectionList()
    {
        return DB::select("SELECT * FROM  SSHR_EVAL_SECTION");
    }

    // getSectionPointList Funtion To Get Sections Points list from DB
    public function getSectionPointList()
    {
        return DB::select("SELECT * FROM  SSHR_EVAL_POINTS");
    }
}
