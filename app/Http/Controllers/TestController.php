<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class TestController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function test(){
        $data = array(
            array('Name'=>'parvez', 'Empid'=>11, 'Salary'=>101),
            array('Name'=>'alam', 'Empid'=>1, 'Salary'=>102),
            array('Name'=>'phpflow', 'Empid'=>21, 'Salary'=>103)
        );
       // echo json_encode($data);
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData"=>$data);
        /*while($row = $result->fetch_array(MYSQLI_ASSOC)){
          $results["data"][] = $row ;
        }*/

        //echo json_encode($results);
        $v = DB::select('SELECT `id_time`, `name_subject`,`name`,`lastname`,`patronymic`
                            FROM `timetable` INNER JOIN `time` ON timetable.time_id = time.id_time
                            INNER JOIN `pairs` ON timetable.pairs_id = pairs.id_pairs
                            INNER JOIN `subjects` ON pairs.subjects_id=subjects.id_subjects
                            INNER JOIN `user` ON user.group_id=pairs.group_id
                            INNER JOIN `groups` ON groups.id_group=pairs.group_id');
        $res = array(
            "sEcho" => 1,
            "iTotalRecords" => count($v),
            "iTotalDisplayRecords" => count($v),
            "aaData"=>$v);
        echo json_encode($res);
        //var_dump($v);
        //echo count($v);
            //echo $v->name_subject."<br>";

        //echo $v;
    }
}
