<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\ServiceLogic;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponsHelper;

class EvaluationController extends Controller
{
    protected $serviceLogic;
    public function __construct(ServiceLogic $serviceLogic)
    {
        $this->serviceLogic = $serviceLogic;
    }


    // Index Funtion To Get Evaluation list from DB
    public function index()
    {
        try {
            $employee_number = 16199;
            $evaluation_list = $this->serviceLogic->getEvaluationList($employee_number);
            return ResponsHelper::success($evaluation_list);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // sectionList Funtion To Get  Section List from DB
    public function sectionList()
    {
        try {
            $section_list = $this->serviceLogic->getSectionList();
            return ResponsHelper::success($section_list);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // pointsList Funtion To Get Points list from DB
    public function pointsList()
    {
        try {
            $section_point_list = $this->serviceLogic->getSectionPointList();
            return ResponsHelper::success($section_point_list);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // evaluationHistoryList Funtion To Get Evaluation History list from DB
    public function evaluationHistoryList()
    {
        try {
            $employee_number = 16199;
            $evaluation_history_list = $this->serviceLogic->getEvaluationHistoryList($employee_number);
            return ResponsHelper::success($evaluation_history_list);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // evaluationDetailsHistoryList Funtion To Get Evaluation Details History list from DB
    public function evaluationDetailsHistoryList()
    {
        try {
            $employee_number = 16199;
            $evaluation_details_history_list = $this->serviceLogic->getEvaluationDetailsHistoryList($employee_number);
            return ResponsHelper::success($evaluation_details_history_list);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // submitEvaluation Funtion To Update the evaluation
    public function submitEvaluation(Request $request)
    {
        try {
            // dd($request);
            $evaluation_list = $this->serviceLogic->submitEvaluation($request);
            return ResponsHelper::success($evaluation_list);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // addNewSection Funtion To Add New Section In Table Evalaution Sections
    public function addNewSection(Request $request)
    {
        try {
            $section_Info = $this->serviceLogic->addNewSection($request);
            return ResponsHelper::success($section_Info);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // addNewPoint Funtion To Add New Points In Evaluation Section Points Taable
    public function addNewPoint(Request $request)
    {
        try {
            // dd($request);
            $points_Info = $this->serviceLogic->addNewPoint($request);
            return ResponsHelper::success($points_Info);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // updateSection Funtion To Update Section In Evaluation Section  Taable
    public function updateSection(Request $request)
    {
        try {
            // dd($request);
            $section_Info = $this->serviceLogic->updateSection($request);
            return ResponsHelper::success($section_Info);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // updatePoint Funtion To Update Points In Evaluation Section Points Taable
    public function updatePoint(Request $request)
    {
        try {
            $points_Info = $this->serviceLogic->updatePoint($request);
            return ResponsHelper::success($points_Info);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // deleteSection Funtion To Delete Sections In Evaluation Section  Taable
    public function deleteSection(Request $request)
    {
        try {
            // dd($request);
            $section_id = $this->serviceLogic->deleteSection($request);
            return ResponsHelper::success($section_id);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // deletePoint Funtion To Delete Points In Evaluation Section Points Taable
    public function deletePoint(Request $request)
    {
        try {
            // dd($request);
            $points_id = $this->serviceLogic->deletePoint($request);
            return ResponsHelper::success($points_id);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }
}
