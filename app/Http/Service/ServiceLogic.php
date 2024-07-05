<?php

namespace App\Http\Service;


use App\Http\Repository\MainOracleRepo;
use Illuminate\Http\Request;


// ServiceLogic Class Contain All function thats do the logic for all requsets
class ServiceLogic
{
    protected $mainOracleRepo;

    public function __construct(MainOracleRepo $mainOracleRepo)
    {
        $this->mainOracleRepo = $mainOracleRepo;
    }


    // getEvaluationList Funtion To Get Evaluation list from DB
    public function getEvaluationList($employee_number)
    {
        return $this->mainOracleRepo->getEvaluationList($employee_number);
    }

    // getSectionList Funtion To Get Sections list from DB
    public function getSectionList()
    {
        return $this->mainOracleRepo->getSectionList();
    }
    // getSectionPointList Funtion To Get Sections Points list from DB
    public function getSectionPointList()
    {
        return $this->mainOracleRepo->getSectionPointList();
    }
}
