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

    // getEvaluationHistoryList Funtion To Get Evaluation History list from DB
    public function getEvaluationHistoryList($employee_number)
    {
        return $this->mainOracleRepo->getEvaluationHistoryList($employee_number);
    }

    // getEvaluationDetailsHistoryList Funtion To Get Evaluation Details History list from DB
    public function getEvaluationDetailsHistoryList($employee_number)
    {
        return $this->mainOracleRepo->getEvaluationDetailsHistoryList($employee_number);
    }

    // getSectionPointList Funtion To Get Sections Points list from DB
    public function submitEvaluation($request)
    {
        // Extract the Evaluation Details into individual variables
        $evaluationDetails = $request->evaluation_details[0];
        $p_eval_id = $evaluationDetails['p_eval_id'];
        $p_total_grade = $evaluationDetails['p_total_grade'];
        $p_login_user = $evaluationDetails['p_login_user'];
        $p_perfmce_decn = $evaluationDetails['p_perfmce_decn'];
        $p_comments = $evaluationDetails['p_comments'];
        
        // Store the Point Details single variable
        $pointDetailsArray = $request->point_details;

        return $this->mainOracleRepo->submitEvaluation($p_eval_id, $p_total_grade, $p_login_user, $p_perfmce_decn, $p_comments, $pointDetailsArray);
    }

    // addNewSection Funtion To Add New Section In Table Evalaution Sections
    public function addNewSection($request)
    {
        $p_section_name_en = $request->p_section_name_en;
        $p_section_name_ar = $request->p_section_name_ar;
        $p_section_calc_value = $request->p_section_calc_value;
        $p_login_user = $request->p_login_user;
        return $this->mainOracleRepo->addNewSection($p_section_name_en, $p_section_name_ar, $p_section_calc_value, $p_login_user);
    }

    // addNewPoint Funtion To Add New Points In Evaluation Section Points Taable 
    public function addNewPoint($request)
    {
        $p_section_id  = $request->p_section_id;
        $p_eval_point_name_en = $request->p_eval_point_name_en;
        $p_eval_point_name_ar = $request->p_eval_point_name_ar;
        $p_min_grade = $request->p_min_grade;
        $p_max_grade = $request->p_max_grade;
        $p_login_use = $request->p_login_use;
        return $this->mainOracleRepo->addNewPoint($p_section_id, $p_eval_point_name_en, $p_eval_point_name_ar, $p_min_grade, $p_max_grade, $p_login_use);
    }
}
