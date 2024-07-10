<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;


// MainOracleRepo Class Contain All function thats deal with DB
class MainOracleRepo
{

    // getEvaluationList Funtion To Get Evaluation list from DB
    public function getEvaluationList($employee_number)
    {
        return DB::select("SELECT sshr_emp_evaluation.eval_mgr_pending_trxns ($employee_number) FROM dual");
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

    // getEvaluationHistoryList Funtion To Get Evaluation History list from DB
    public function getEvaluationHistoryList($employee_number)
    {
        return DB::select("SELECT sshr_emp_evaluation.eval_mgr_history_trxns($employee_number) FROM dual");
    }

    // getEvaluationDetailsHistoryList Funtion To Get Evaluation Details History list from DB
    public function getEvaluationDetailsHistoryList($employee_number)
    {
        return DB::select("SELECT sshr_emp_evaluation.eval_detail_history_mgr_trxns ($employee_number) FROM dual");
    }

    // submitEvaluation Funtion To Update Evaluation Requset
    public function submitEvaluation($p_eval_id, $p_total_grade, $p_login_user, $p_perfmce_decn, $p_comments,  $pointDetailsArray)
    {

        DB::statement("BEGIN sshr_emp_evaluation.mgr_update_eval_data ($p_eval_id , $p_total_grade, $p_login_user, '$p_perfmce_decn', '$p_comments'); END;");

        foreach ($pointDetailsArray as $detail) {
            $eval_id = $detail['eval_id'];
            $eval_point_id = $detail['eval_point_id'];
            $eval_grade = $detail['eval_grade'];
            $login_user = $detail['login_user'];
            DB::statement("BEGIN sshr_emp_evaluation.insert_trxn_evaluation_details($eval_id, $eval_point_id, $eval_grade, $login_user); END;");
        }

        DB::statement("BEGIN sshr_emp_evaluation.insert_trxn_eval_details_hist($p_eval_id, $p_login_user); END;");
        DB::statement(" BEGIN  sshr_emp_evaluation.insert_trxn_history_table($p_eval_id); END;");

        return "Evaluation Updated Successfully";
    }

    // addNewSection Funtion To Add New Section In Table Evalaution Sections
    public function addNewSection($p_section_name_en, $p_section_name_ar, $p_section_calc_value, $p_login_user)
    {
        DB::statement("
            BEGIN 
                sshr_emp_evaluation.insert_eval_section_data(
                '$p_section_name_en',
                '$p_section_name_ar',
                $p_section_calc_value,
                $p_login_user
                ); END;");
        return "Section Added Successfully"; 
    }

    // addNewPoint Funtion To Add New Points In Evaluation Section Points Taable 
    public function addNewPoint($p_section_id, $p_eval_point_name_en, $p_eval_point_name_ar, $p_min_grade, $p_max_grade, $p_login_use)
    {
        DB::statement("
            BEGIN 
                sshr_emp_evaluation.insert_eval_points_data(
                $p_section_id,
                '$p_eval_point_name_en',
                '$p_eval_point_name_ar', 
                $p_min_grade, $p_max_grade,
                $p_login_use
                ); END;" );
        return "Point Added Successfully"; 
    }
}



