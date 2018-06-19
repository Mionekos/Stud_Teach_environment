<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\AttendanceHistory;
use App\Dayofweek;
use App\Pairs;
use App\Subjects;
use App\Time;
use App\Timetable;
use App\User;
use App\LectPract;
use App\Cabinets;
use DateInterval;
use DatePeriod;
use Faker\Provider\DateTime;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Test;
use App\Group;

class TimetableController extends BaseController
{
    public function getGroupTimetable(Request $request){
        $groups = Group::where("group_name","LIKE",'%'.$request->get("term").'%')->take(5)->get();
        return response()->json($groups);
    }
    public function getTeacherForTimetableTeacher(Request $request)
    {
        $seed = '%' . $request->get("term") . '%';
        $teachers = User::select('name',"lastname","patronymic","post_id","id_user")
            ->where("lastname", "LIKE", $seed)
            ->orWhere("name", $seed)
            ->orWhere("patronymic", $seed)
            ->whereNotNull('post_id')->get();
        return response()->json($teachers);
    }
    public function getWeekNumber($date){
        $Rdate = explode("-", $date);
        $test = strtotime($Rdate[2].".".$Rdate[1].".".$Rdate[0]);
        $week = date("W", $test);
        return $week;
    }
    public function showTimetableForStudents(Request $request)
    {
        //получили данные
        $user_timetable = $request->all();
        $date_f =new \DateTime(date('Y-m-d',strtotime($user_timetable['daterangepicker_start'])));
        $date_s = new \DateTime(date('Y-m-d',strtotime('+1 day', strtotime($user_timetable['daterangepicker_end']))));
        $group_select = $user_timetable['number_group'];
        //strtotime('+1 day', strtotime($date_f))
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
            if (($arr_dates[$i]['evenofweek'])%2!=0){
                $evenofweek=1;
            }
            elseif(($arr_dates[$i]['evenofweek'])%2==0){
                $evenofweek=2;
            }
            $timetable = DB::select('SELECT `begin`,`finish`,`day`,`name_subject`,`name_lectpract`,`num_cabinet`,`name`,`lastname`,`patronymic`,`group_name`,`evenofweek` FROM `timetable` INNER JOIN cabinets ON timetable.cabinets_id=cabinets.id_cabinets
                                    INNER JOIN time ON timetable.time_id=time.id_time 
                                    INNER JOIN dayofweek ON timetable.dayofweek_id=dayofweek.id_dayofweek 
                                    INNER JOIN lecture_practic ON timetable.lecture_practic_id=lecture_practic.id_lecture_practic 
                                    INNER JOIN pairs ON timetable.pairs_id=pairs.id_pairs 
                                    INNER JOIN subjects ON pairs.subjects_id=subjects.id_subjects 
                                    INNER JOIN user ON pairs.user_id=user.id_user 
                                    INNER JOIN groups ON pairs.group_id=groups.id_group WHERE dayofweek.id_dayofweek=' . $arr_dates[$i]['dayofweek'] . ' AND groups.group_name=' . '"' . $group_select . '"'.'AND evenofweek=' . '"' . $evenofweek . '" OR dayofweek.id_dayofweek=' . $arr_dates[$i]['dayofweek'] . ' AND groups.group_name=' . '"' . $group_select . '"'.'AND evenofweek=3');
            if (empty($timetable)) {
                continue;
            } else {
                $day = $timetable[0]->day;
                array_push($arr, ['date' => date('d-m-Y',strtotime($arr_dates[$i]['date'])), 'day_of_the_week' => $day, 'pairs' => $timetable]);
            }
            $result["data"] = $arr;
            $result["group"] = $timetable[0]->group_name;
            $result["start_date"] = $arr_dates[0]['date'];
            $result["end_date"] = $arr_dates[$count-1]['date'];
            $result["evenofweek"] = $arr_dates[0]['evenofweek']-1;

        }
        return response()->json($result);
    }
    public function getTimetableForTeachers (Request $request){
        //получили данные
        $teacher_timetable = $request->all();
        $date_f =new \DateTime(date('Y-m-d',strtotime($teacher_timetable['daterangepicker_start'])));
        $date_s = new \DateTime(date('Y-m-d',strtotime('+1 day', strtotime($teacher_timetable['daterangepicker_end']))));
        $teacher = $teacher_timetable['search_teacher'];
        $teacher_split = explode(' ', $teacher);

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
            if (($arr_dates[$i]['evenofweek'])%2!=0){
                $evenofweek=1;
            }
            elseif(($arr_dates[$i]['evenofweek'])%2==0){
                $evenofweek=2;
            }
            $timetable = DB::select('SELECT `begin`,`finish`,`day`,`name_subject`,`name_lectpract`,`num_cabinet`,`name`,`lastname`,`patronymic`,`group_name`,`evenofweek` 
                                    FROM `timetable` 
                                    INNER JOIN cabinets ON timetable.cabinets_id=cabinets.id_cabinets
                                    INNER JOIN time ON timetable.time_id=time.id_time 
                                    INNER JOIN dayofweek ON timetable.dayofweek_id=dayofweek.id_dayofweek 
                                    INNER JOIN lecture_practic ON timetable.lecture_practic_id=lecture_practic.id_lecture_practic 
                                    INNER JOIN pairs ON timetable.pairs_id=pairs.id_pairs 
                                    INNER JOIN subjects ON pairs.subjects_id=subjects.id_subjects 
                                    INNER JOIN user ON pairs.user_id=user.id_user 
                                    INNER JOIN groups ON pairs.group_id=groups.id_group 
                                    WHERE dayofweek.id_dayofweek=' . $arr_dates[$i]['dayofweek'] . ' 
                                    AND evenofweek=' . '"' . $evenofweek . '"'.'
                                    AND user.lastname='.'"'.$teacher_split[0].'"'.'
                                    AND user.name='.'"'.$teacher_split[1].'"'.'
                                    AND user.patronymic='.'"'.$teacher_split[2].'"'.'
                                    OR dayofweek.id_dayofweek=' . $arr_dates[$i]['dayofweek'] . '
                                    AND user.lastname='.'"'.$teacher_split[0].'"'.'
                                    AND user.name='.'"'.$teacher_split[1].'"'.'
                                    AND user.patronymic='.'"'.$teacher_split[2].'"'.'
                                    AND evenofweek=3');
            if (empty($timetable)) {
                continue;
            } else {
                $day = $timetable[0]->day;
                array_push($arr, ['date' => date('d-m-Y',strtotime($arr_dates[$i]['date'])), 'day_of_the_week' => $day, 'pairs' => $timetable]);
            }
            $result["data"] = $arr;
            $result["group"] = $timetable[0]->group_name;
            $result["start_date"] = $arr_dates[0]['date'];
            $result["end_date"] = $arr_dates[$count-1]['date'];
            $result["evenofweek"] = $arr_dates[0]['evenofweek']-1;

        }
        return response()->json($result);
    }
}
