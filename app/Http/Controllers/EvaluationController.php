<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\ServiceLogic;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponsHelper;
use setasign\Fpdi\Fpdi;
use App\Services\PdfService;
use Carbon\Carbon;
// use App\Helper\UploadDocumnetAcrchive;


class EvaluationController extends Controller
{
    protected $serviceLogic;
    protected $pdfService;
    protected $uploadTemplet;

    public function __construct(ServiceLogic $serviceLogic, PdfService $pdfService)
    {
        $this->pdfService = $pdfService;
        $this->serviceLogic = $serviceLogic;
        // $this->uploadTemplet = $uploadTemplet;
    }

    // Index Funtion To Check The IP Address And The Hashkey
    public function index(Request $request)
    {
        try {

            $ip_address = $request->ip_address;
            $hashkey = $request->hash_key;

            $hashkey = $this->serviceLogic->checkUserValidation($hashkey, $ip_address);
            return ResponsHelper::success($hashkey);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // Index Funtion To Get Evaluation list from DB
    public function evaluationList(Request $request)
    {
        try {
            $employee_number = $request->employee_number;
            // dd($employee_number);
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
    public function evaluationHistoryList(Request $request)
    {
        try {
            $employee_number = $request->employee_number;
            $evaluation_history_list = $this->serviceLogic->getEvaluationHistoryList($employee_number);
            return ResponsHelper::success($evaluation_history_list);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // evaluationDetailsHistoryList Funtion To Get Evaluation Details History list from DB
    public function evaluationDetailsHistoryList(Request $request)
    {
        try {
            $employee_number = $request->employee_number;
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
            $evaluation_list = $this->serviceLogic->submitEvaluation($request);
            return ResponsHelper::success($evaluation_list);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }

    // // fillEvaluationTemplate Funtion To fill  Evaluation PDF Template
    // public function fillEvaluationTemplate(Request $request)
    // {

    //     try {

    //         $data = $request->point_details;
    //         // dd($request->point_details);
    //         $creationDate = Carbon::parse($request->input('creation_date'))->format('Y-m-d');
    //         $templatePath = storage_path('public/ALAJMI_EMP_EVALUATION_DETAILS.docx');
    //         $outputPath = storage_path('public/documents/Evaluation_' . $creationDate  . '.pdf');

    //         $this->uploadTemplet->upload($templatePath, $data, $outputPath);

    //         // return response()->download($outputPath);
    //     } catch (\Exception $e) {
    //         return ResponsHelper::error($e->getMessage());
    //     }
    // }

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
            $points_id = $this->serviceLogic->deletePoint($request);
            return ResponsHelper::success($points_id);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }
}
