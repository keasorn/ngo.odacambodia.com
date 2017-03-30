<?php
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 11:52 AM
 */

namespace App\Http\Controllers\ngo\project;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use App\Http\Controllers\MyUtility;
use App\Models\ngo\ProjectSectorModel;

class ProjectSectorController extends Controller
{
    private $proSectorModel;

    function insert(Request $request)
    {
        $this->proSectorModel = new ProjectSectorModel();

        $dataSetProjectSector = array(
            ['SectorYear' => '2014', 'Amount' => $request->Amount2014, 'SectorName_E' => $request->SectorName_E, 'SubSectorName_E' => $request->SubSectorName_E, 'PRN' => $request->PRN],
            ['SectorYear' => '2015', 'Amount' => $request->Amount2015, 'SectorName_E' => $request->SectorName_E, 'SubSectorName_E' => $request->SubSectorName_E, 'PRN' => $request->PRN],
            ['SectorYear' => '2016', 'Amount' => $request->Amount2016, 'SectorName_E' => $request->SectorName_E, 'SubSectorName_E' => $request->SubSectorName_E, 'PRN' => $request->PRN],
            ['SectorYear' => '2017', 'Amount' => $request->Amount2017, 'SectorName_E' => $request->SectorName_E, 'SubSectorName_E' => $request->SubSectorName_E, 'PRN' => $request->PRN],
            ['SectorYear' => '2018', 'Amount' => $request->Amount2018, 'SectorName_E' => $request->SectorName_E, 'SubSectorName_E' => $request->SubSectorName_E, 'PRN' => $request->PRN],
            ['SectorYear' => '2019', 'Amount' => $request->Amount2019, 'SectorName_E' => $request->SectorName_E, 'SubSectorName_E' => $request->SubSectorName_E, 'PRN' => $request->PRN]
        );
        $insert = DB::table('tbl_ngo_project_sector')->insert($dataSetProjectSector);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function  delete(Request $request)
    {
        $SectorYear = [2014, 2015, 2016, 2017, 2018, 2019];
        $this->proSectorModel = ProjectSectorModel::where('PRN', $request->PRN)->where('SectorName_E', $request->hiddenOldSectorCode)
            ->where("SubSectorName_E", $request->hiddenOldSubSectorCode)->whereIn("SectorYear", $SectorYear);
        if ($this->proSectorModel->delete()) {
            return 1;
        }

    }

    function  deleteChecked(Request $request)
    {
        $SectorYear = [2014, 2015, 2016, 2017, 2018, 2019];
        $SubSectorName_E = explode(",", $request->SubSectorName_E);
        $this->proSectorModel = ProjectSectorModel::where('PRN', $request->PRN)->whereIn('SubSectorName_E', $SubSectorName_E)->whereIn("SectorYear", $SectorYear);
        if ($this->proSectorModel->delete()) {
            return 1;
        }

    }

    function update(Request $request)
    {

        $this->proSectorModel = ProjectSectorModel::where('PRN', $request->PRN)->where('SectorYear', '2014')
            ->where('SectorName_E', $request->hiddenOldSectorCode)
            ->where("SubSectorName_E", $request->hiddenOldSubSectorCode)->first();
        $this->proSectorModel->Amount = $request->Amount2014;
        $this->proSectorModel->SectorName_E = $request->SectorName_E;
        $this->proSectorModel->SubSectorName_E = $request->SubSectorName_E;
        $this->proSectorModel->save();

        $this->proSectorModel = ProjectSectorModel::where('PRN', $request->PRN)->where('SectorYear', '2015')
            ->where('SectorName_E', $request->hiddenOldSectorCode)
            ->where("SubSectorName_E", $request->hiddenOldSubSectorCode)->first();
        $this->proSectorModel->Amount = $request->Amount2015;
        $this->proSectorModel->SectorName_E = $request->SectorName_E;
        $this->proSectorModel->SubSectorName_E = $request->SubSectorName_E;
        $this->proSectorModel->save();


        $this->proSectorModel = ProjectSectorModel::where('PRN', $request->PRN)->where('SectorYear', '2016')
            ->where('SectorName_E', $request->hiddenOldSectorCode)
            ->where("SubSectorName_E", $request->hiddenOldSubSectorCode)->first();
        $this->proSectorModel->Amount = $request->Amount2016;
        $this->proSectorModel->SectorName_E = $request->SectorName_E;
        $this->proSectorModel->SubSectorName_E = $request->SubSectorName_E;
        $this->proSectorModel->save();


        $this->proSectorModel = ProjectSectorModel::where('PRN', $request->PRN)->where('SectorYear', '2017')
            ->where('SectorName_E', $request->hiddenOldSectorCode)
            ->where("SubSectorName_E", $request->hiddenOldSubSectorCode)->first();
        $this->proSectorModel->Amount = $request->Amount2017;
        $this->proSectorModel->SectorName_E = $request->SectorName_E;
        $this->proSectorModel->SubSectorName_E = $request->SubSectorName_E;
        $this->proSectorModel->save();

        $this->proSectorModel = ProjectSectorModel::where('PRN', $request->PRN)->where('SectorYear', '2018')
            ->where('SectorName_E', $request->hiddenOldSectorCode)
            ->where("SubSectorName_E", $request->hiddenOldSubSectorCode)->first();
        $this->proSectorModel->Amount = $request->Amount2018;
        $this->proSectorModel->SectorName_E = $request->SectorName_E;
        $this->proSectorModel->SubSectorName_E = $request->SubSectorName_E;
        $this->proSectorModel->save();


        $this->proSectorModel = ProjectSectorModel::where('PRN', $request->PRN)->where('SectorYear', '2019')
            ->where('SectorName_E', $request->hiddenOldSectorCode)
            ->where("SubSectorName_E", $request->hiddenOldSubSectorCode)->first();
        $this->proSectorModel->Amount = $request->Amount2019;
        $this->proSectorModel->SectorName_E = $request->SectorName_E;
        $this->proSectorModel->SubSectorName_E = $request->SubSectorName_E;
        $this->proSectorModel->save();


    }


}