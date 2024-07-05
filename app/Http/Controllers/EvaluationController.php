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


    // Index Funtion To Get ( Evaluation list, Section List, Section Point List) from DB
    public function index()
    {
        try {
            $employee_number = 16199;

            $evaluation_list = $this->serviceLogic->getEvaluationList($employee_number);
            $section_list = $this->serviceLogic->getSectionList();
            $section_point_list = $this->serviceLogic->getSectionPointList();
            $data = [
                'evaluation_list' => $evaluation_list,
                'section_list' => $section_list,
                'section_point_list' => $section_point_list,
            ];

            return ResponsHelper::success($data);
        } catch (\Exception $e) {
            return ResponsHelper::error($e->getMessage());
        }
    }
}
