<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use DB;
use Lava;
use App\Danpla;
use App\DanplaType;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Column Chart
        $danplaLocation = \Lava::DataTable();
        $data1 = DB::select('SELECT masterdatabase.dmc_customer.CUSTOMER_NAME as location, count(dmsdatabase.danplas.`location_id`) as total FROM dmsdatabase.`danplas` INNER JOIN masterdatabase.dmc_customer ON dmsdatabase.danplas.`location_id`= masterdatabase.dmc_customer.CUSTOMER_ID WHERE dmsdatabase.danplas.`location_id` IS NOT null GROUP BY dmsdatabase.danplas.`location_id` ORDER BY location');
        /* $dataLocation = Danpla::select(array('location_id'))->get()->toArray(); */
        /* foreach($data as $dat){
            $loclabels[] = $dat->location_id;
            $locdt[] = $dat->total;
        } */
        $danplaLocation->addStringColumn('Location')
                        ->addNumberColumn('Total');
                        /* ->addRow($loclabels,$locdt) */;
        foreach($data1 as $dat){
            $danplaLocation->addRow([$dat->location,$dat->total]);
        }
        
        \Lava::ColumnChart('Locations',$danplaLocation,[
            'title'=>'Location Summary',
            'colors'=> array('#26C6DA'),
            ]);

        // Bar Chart
        $danplaLocation1 = \Lava::DataTable();
        $data2 = DB::select('SELECT masterdatabase.dmc_customer.CUSTOMER_NAME as location, count(dmsdatabase.danplas.`location_id`) as total FROM dmsdatabase.`danplas` INNER JOIN masterdatabase.dmc_customer ON dmsdatabase.danplas.`location_id`= masterdatabase.dmc_customer.CUSTOMER_ID WHERE dmsdatabase.danplas.`location_id` IS NOT null GROUP BY dmsdatabase.danplas.`location_id` ORDER BY location');
        /* $dataLocation = Danpla::select(array('location_id'))->get()->toArray(); */
        /* foreach($data as $dat){
            $loclabels[] = $dat->location_id;
            $locdt[] = $dat->total;
        } */
        $danplaLocation1->addStringColumn('Location')
                        ->addNumberColumn('Total');
                        /* ->addRow($loclabels,$locdt) */;
        foreach($data2 as $dat){
            $danplaLocation1->addRow([$dat->location,$dat->total]);
        }
        
        \Lava::BarChart('Locations1',$danplaLocation1,[
            'title'=>'Danpla per Location',
            'colors'   => array('#26C6DA'),
            ]);

        // Pie Chart
        $danplaLocation2 = \Lava::DataTable();
        $data3 = DB::select('SELECT masterdatabase.dmc_customer.CUSTOMER_NAME as location, count(dmsdatabase.danplas.`location_id`) as total FROM dmsdatabase.`danplas` INNER JOIN masterdatabase.dmc_customer ON dmsdatabase.danplas.`location_id`= masterdatabase.dmc_customer.CUSTOMER_ID WHERE dmsdatabase.danplas.`location_id` IS NOT null GROUP BY dmsdatabase.danplas.`location_id` ORDER BY location');
        /* $dataLocation = Danpla::select(array('location_id'))->get()->toArray(); */
        /* foreach($data as $dat){
            $loclabels[] = $dat->location_id;
            $locdt[] = $dat->total;
        } */
        $danplaLocation2->addStringColumn('Location')
                        ->addNumberColumn('Total');
                        /* ->addRow($loclabels,$locdt) */;
        foreach($data3 as $dat){
            $danplaLocation2->addRow([$dat->location,$dat->total]);
        }
        
        \Lava::PieChart('Locations2',$danplaLocation2,[
            'title'=>'Danpla Location',
            'is3D'   => true,
            ]);

        // Line Chart
        $danplaLocation3 = \Lava::DataTable();
        $data4 = DB::select('SELECT masterdatabase.dmc_customer.CUSTOMER_NAME as location, count(dmsdatabase.danplas.`location_id`) as total FROM dmsdatabase.`danplas` INNER JOIN masterdatabase.dmc_customer ON dmsdatabase.danplas.`location_id`= masterdatabase.dmc_customer.CUSTOMER_ID WHERE dmsdatabase.danplas.`location_id` IS NOT null GROUP BY dmsdatabase.danplas.`location_id` ORDER BY location');
        
        $danplaLocation3->addStringColumn('Location')
                        ->addNumberColumn('Total');
        foreach($data4 as $dat){
            $danplaLocation3->addRow([$dat->location,$dat->total]);
        }
        
        \Lava::LineChart('Locations3',$danplaLocation3,[
            'title'=>'Danpla per Location',
            'pointSize'=> 10,
            'is3D'   => true,
            ]);

        // Summary Table
        $data5 = DB::select('SELECT masterdatabase.dmc_customer.CUSTOMER_NAME as location, count(dmsdatabase.danplas.`location_id`) as total FROM dmsdatabase.`danplas` INNER JOIN masterdatabase.dmc_customer ON dmsdatabase.danplas.`location_id`= masterdatabase.dmc_customer.CUSTOMER_ID WHERE dmsdatabase.danplas.`location_id` IS NOT null GROUP BY dmsdatabase.danplas.`location_id` ORDER BY location');
        $summary_total = count(Danpla::where('location_id','!=',null)->get());

        // Danpla Status
        $d_status1 = DB::select('SELECT COUNT(*) as total, `danpla_types`.`name` as location FROM `danplas` INNER JOIN `danpla_types` ON `danplas`.`type_id` = `danpla_types`.`id` WHERE `status_id` = 1 GROUP BY `type_id`');
        $d_status1_total = COUNT(Danpla::where('status_id',1)->get());
        $d_status2 = DB::select('SELECT COUNT(*) as total, `danpla_types`.`name` as location FROM `danplas` INNER JOIN `danpla_types` ON `danplas`.`type_id` = `danpla_types`.`id` WHERE `status_id` = 2 GROUP BY `type_id`');
        $d_status2_total = COUNT(Danpla::where('status_id',2)->get());

        // Danpla Sizes
        $d_type = DanplaType::get();

        $d_type1 = DB::select('SELECT masterdatabase.dmc_customer.CUSTOMER_NAME as location, count(dmsdatabase.danplas.`location_id`) as total FROM dmsdatabase.`danplas` INNER JOIN masterdatabase.dmc_customer ON dmsdatabase.danplas.`location_id`= masterdatabase.dmc_customer.CUSTOMER_ID WHERE dmsdatabase.danplas.`location_id` IS NOT null  AND dmsdatabase.danplas.`type_id` = 1 GROUP BY dmsdatabase.danplas.`location_id` ORDER BY location');
        $type1_total = count(Danpla::where('type_id',1)->where('location_id','!=',null)->get());

        $d_type2 = DB::select('SELECT masterdatabase.dmc_customer.CUSTOMER_NAME as location, count(dmsdatabase.danplas.`location_id`) as total FROM dmsdatabase.`danplas` INNER JOIN masterdatabase.dmc_customer ON dmsdatabase.danplas.`location_id`= masterdatabase.dmc_customer.CUSTOMER_ID WHERE dmsdatabase.danplas.`location_id` IS NOT null  AND dmsdatabase.danplas.`type_id` = 2 GROUP BY dmsdatabase.danplas.`location_id` ORDER BY location');
        $type2_total = count(Danpla::where('type_id',2)->where('location_id','!=',null)->get());

        $d_type3 = DB::select('SELECT masterdatabase.dmc_customer.CUSTOMER_NAME as location, count(dmsdatabase.danplas.`location_id`) as total FROM dmsdatabase.`danplas` INNER JOIN masterdatabase.dmc_customer ON dmsdatabase.danplas.`location_id`= masterdatabase.dmc_customer.CUSTOMER_ID WHERE dmsdatabase.danplas.`location_id` IS NOT null  AND dmsdatabase.danplas.`type_id` = 3 GROUP BY dmsdatabase.danplas.`location_id` ORDER BY location');
        $type3_total = count(Danpla::where('type_id',3)->where('location_id','!=',null)->get());

        $d_type4 = DB::select('SELECT masterdatabase.dmc_customer.CUSTOMER_NAME as location, count(dmsdatabase.danplas.`location_id`) as total FROM dmsdatabase.`danplas` INNER JOIN masterdatabase.dmc_customer ON dmsdatabase.danplas.`location_id`= masterdatabase.dmc_customer.CUSTOMER_ID WHERE dmsdatabase.danplas.`location_id` IS NOT null  AND dmsdatabase.danplas.`type_id` = 4 GROUP BY dmsdatabase.danplas.`location_id` ORDER BY location');
        $type4_total = count(Danpla::where('type_id',4)->where('location_id','!=',null)->get());

        return view('pages.dashboard',compact(
            'data5',
            'd_type',
            'd_type1',
            'd_type2',
            'd_type3',
            'd_type4',
            'summary_total',
            'type1_total',
            'type2_total',
            'type3_total',
            'type4_total',
            'd_status1',
            'd_status1_total',
            'd_status2',
            'd_status2_total'
        ));
    }
}
