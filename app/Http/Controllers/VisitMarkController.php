<?php

namespace App\Http\Controllers;

use App\AttendanceHistory;
use App\Pairs;
use App\Subjects;
use App\Timetable;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Test;
use Faker\Provider\DateTime;
use DateInterval;
use DatePeriod;

class VisitMarkController extends BaseController
{
    public function getSubjectForVisitMarkStudents(Request $request){
        $subjects = Subjects::all();
        return response()->json($subjects);
    }
    public function getWeekNumber($date){
        $Rdate = explode("-", $date);
        $test = strtotime($Rdate[2].".".$Rdate[1].".".$Rdate[0]);
        $week = date("W", $test);
        return $week;
    }
    public function showTableVisitMarkForStudents(Request $request){

        $tableVisitMark = $request->all();
        //$date_f =new \DateTime(date('Y-m-d',strtotime($tableVisitMark['daterangepicker_start'])));
        //$date_s = new \DateTime(date('Y-m-d',strtotime('+1 day', strtotime($tableVisitMark['daterangepicker_end']))));
       $subject_select = $tableVisitMark['name_subject'];

        $visitMarkForStudent = DB::select('SELECT `date`,`id_time`, `name_subject`, `options`,`mark` 
                                            FROM attendance
                                        INNER JOIN `timetable`ON timetable.id_timetable=attendance.timetable_id
                                        INNER JOIN `time` ON time.id_time=timetable.time_id
                                        INNER JOIN `pairs` ON pairs.id_pairs=timetable.pairs_id
                                        INNER JOIN `subjects` ON subjects.id_subjects=pairs.subjects_id
                                        INNER JOIN `visits` ON visits.id_visits=attendance.visits_id
                                        WHERE pairs.subjects_id='.$subject_select);
        $res = array(
            "draw" => 1,
            "recordsTotal" => count($visitMarkForStudent),
            "recordsFiltered" => count($visitMarkForStudent),
            "data"=>$visitMarkForStudent);
        return response()->json($res);
        /*
        $tableVisitMark = $request->all();
        $date_f =new \DateTime(date('Y-m-d',strtotime($tableVisitMark['daterangepicker_start'])));
        $date_s = new \DateTime(date('Y-m-d',strtotime('+1 day', strtotime($tableVisitMark['daterangepicker_end']))));
        $group_select = $tableVisitMark['number_group'];
        $subject_select = $tableVisitMark['subject'];

        $step = new DateInterval('P1D');
        $period = new DatePeriod($date_f, $step, $date_s);
        $arr_dates = array();
        $count=0;

        foreach ($period as $dates) {
            $dates_split = explode('-', $dates->format("Y-m-d"));
            $dayofweek = date("w", mktime(0, 0, 0, $dates_split[1], $dates_split[2], $dates_split[0]));
            array_push($arr_dates,['date'=>$dates->format("Y-m-d"),'evenofweek'=>$this->getWeekNumber($dates->format("Y-m-d")),'dayofweek'=>$dayofweek]);
            $count++;
        }*/
        /*
        $arr = array();
        for ($i = 0; $i < $count; $i++) {
            if (($arr_dates[$i]['evenofweek']) % 2 != 0) {
                $evenofweek = 1;
            } elseif (($arr_dates[$i]['evenofweek']) % 2 == 0) {
                $evenofweek = 2;
            }
            $visitMarkForStudent = DB::select('SELECT `date`,`id_time`, `name_subject`, `options`,`mark` 
                                        FROM attendance
                                        INNER JOIN `timetable`ON timetable.id_timetable=attendance.timetable_id
                                        INNER JOIN `time` ON time.id_time=timetable.time_id
                                        INNER JOIN `pairs` ON pairs.id_pairs=timetable.pairs_id
                                        INNER JOIN `subjects` ON subjects.id_subjects=pairs.subjects_id
                                        INNER JOIN `visits` ON visits.id_visits=attendance.visits_id');
            $res = array(
                "draw" => 1,
                "recordsTotal" => count($visitMarkForStudent),
                "recordsFiltered" => count($visitMarkForStudent),
                "data"=>$visitMarkForStudent);
            return response()->json($res);
        */
//            $v = DB::select('SELECT `time_id`, `name_subject`,`name`,`lastname`,`patronymic`
//                            FROM `timetable` INNER JOIN `time` ON timetable.time_id = time.id_time
//                            INNER JOIN `pairs` ON timetable.pairs_id = pairs.id_pairs
//                            INNER JOIN `subjects` ON pairs.subjects_id=subjects.id_subjects
//                            INNER JOIN `user` ON user.group_id=pairs.group_id
//                            INNER JOIN `groups` ON groups.id_group=pairs.group_id');
           /* $visitMarkTable = DB::select('SELECT `time_id`, `name_subject`,`name`,`lastname`,`patronymic`,`evenoweek`
                            FROM `timetable` INNER JOIN `time` ON timetable.time_id = time.id_time
                            INNER JOIN `pairs` ON timetable.pairs_id = pairs.id_pairs 
                            INNER JOIN `subjects` ON pairs.subjects_id=subjects.id_subjects
                            INNER JOIN `user` ON user.group_id=pairs.group_id
                            INNER JOIN `groups` ON groups.id_group=pairs.group_id 
                            WHERE groups.group_name='.'"'.$group_select.'"'.'
                            AND subjects.name_subject='.'"'.$subject_select.'"'.'
                            AND timetable.evenofweek='.'"'.$evenofweek.'"'.'
                            OR  subjects.name_subject='.'"'.$subject_select.'"'.' AND groups.group_name='.'"'.$group_select.'"'.'AND timetable.evenofweek=3');*/
           /*
            if (empty($visitMarkForStudent)) {
                $result = "qwe";
                continue;
            } else {
                $date = $visitMarkForStudent[$i]->date;
                $time = $visitMarkForStudent[$i]->id_time;
                $name_subject = $visitMarkForStudent[$i]->name_subject;
                $visit = $visitMarkForStudent[$i]->options;
                $mark = $visitMarkForStudent[$i]->mark;
                array_push($arr,[$date,$time,$name_subject,$visit,$mark]);
                $result["data"]=$arr;
            }*/
        }




    public function showTableVisitMarkForTeachers(Request $request){
        $tableVisitMark = $request->all();
        $date_f =new \DateTime(date('Y-m-d',strtotime($tableVisitMark['daterangepicker_start'])));
        $date_s = new \DateTime(date('Y-m-d',strtotime('+1 day', strtotime($tableVisitMark['daterangepicker_end']))));
        $group_select = $tableVisitMark['number_group'];
        $subject_select = $tableVisitMark['subject'];

        $step = new DateInterval('P1D');
        $period = new DatePeriod($date_f, $step, $date_s);
        $arr_dates = array();
        $count=0;

        foreach ($period as $dates) {
            $dates_split = explode('-', $dates->format("Y-m-d"));
            $dayofweek = date("w", mktime(0, 0, 0, $dates_split[1], $dates_split[2], $dates_split[0]));
            array_push($arr_dates,['date'=>$dates->format("Y-m-d"),'evenofweek'=>$this->getWeekNumber($dates->format("Y-m-d")),'dayofweek'=>$dayofweek]);
            $count++;
        }

        $arr = array();
        for ($i = 0; $i < $count; $i++) {
            if (($arr_dates[$i]['evenofweek']) % 2 != 0) {
                $evenofweek = 1;
            } elseif (($arr_dates[$i]['evenofweek']) % 2 == 0) {
                $evenofweek = 2;
            }

            $v = DB::select('SELECT `id_time`, `name_subject`,`name`,`lastname`,`patronymic`
                            FROM `timetable` INNER JOIN `time` ON timetable.time_id = time.id_time
                            INNER JOIN `pairs` ON timetable.pairs_id = pairs.id_pairs
                            INNER JOIN `subjects` ON pairs.subjects_id=subjects.id_subjects
                            INNER JOIN `user` ON user.group_id=pairs.group_id
                            INNER JOIN `groups` ON groups.id_group=pairs.group_id');
            /* $visitMarkTable = DB::select('SELECT `time_id`, `name_subject`,`name`,`lastname`,`patronymic`,`evenoweek`
                             FROM `timetable` INNER JOIN `time` ON timetable.time_id = time.id_time
                             INNER JOIN `pairs` ON timetable.pairs_id = pairs.id_pairs
                             INNER JOIN `subjects` ON pairs.subjects_id=subjects.id_subjects
                             INNER JOIN `user` ON user.group_id=pairs.group_id
                             INNER JOIN `groups` ON groups.id_group=pairs.group_id
                             WHERE groups.group_name='.'"'.$group_select.'"'.'
            AND subjects.name_subject='.'"'.$subject_select.'"'.'
            AND timetable.evenofweek='.'"'.$evenofweek.'"'.'
            OR  subjects.name_subject='.'"'.$subject_select.'"'.' AND groups.group_name='.'"'.$group_select.'"'.'AND timetable.evenofweek=3');*/
            /*
            if (empty($v)) {
                $result = "qwe";
                continue;
            } else {
                $time = $v[$i]->id_time;
                $name_subject = $v[$i]->name_subject;
                $name = $v[$i]->name;
                $lastname = $v[$i]->lastname;
                $patronymic = $v[$i]->patronymic;
                array_push($arr,[$time,$name_subject,$name,$lastname,$patronymic]);

            }*/
//            $result["data"] = $arr;
//            $result["group"] = $v[0]->group_name;
//            $result["start_date"] = $arr_dates[0]['date'];
//            $result["end_date"] = $arr_dates[$count-1]['date'];
//            $result["evenofweek"] = $arr_dates[0]['evenofweek']-1;
        }
        //return response()->json($result);

    }
}
