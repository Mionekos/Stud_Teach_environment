<?php

namespace App\Http\Controllers;

use App\Cabinets;
use App\Group;
use App\LectPract;
use App\Pairs;
use App\Post;
use App\Role;
use App\Subjects;
use App\Time;
use App\Timetable;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Test;
class AdminController extends BaseController
{
    public function add_role(Request $request){

        $role = $request->get('add_role');

        $role_find = Role::where('role_name',$role)->first();
        if (is_null($role_find)){
            $add_role = Role::create(['role_name'=>$role]);
            echo 1;
        }
        else{
            echo 0;
        }
    }
    public  function add_group(Request $request)
    {
        $group = $request->all();
        $group_find = Group::where('group_name', $group['add_group'])->first();
        if (is_null($group_find)) {
            $add_group = Group::create(["group_name" => $request->get('add_group'), "course_num" => $request->get('add_course')]);
            echo 1;
        }
        else{
            echo 0;
        }
    }

        public function add_subject(Request $request){
            $subject = $request->get('add_subject');
            $subject_find = Subjects::where('name_subject',$subject)->first();
            if (is_null($subject_find)){
                $add_subject = Subjects::create(['name_subject'=>$subject]);
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function add_lectPract(Request $request){
            $lectPract = $request->get('add_lectpract');
            $lectPract_find = LectPract::where('name_lectpract', $lectPract)->first();
            if (is_null($lectPract_find)){
                $add_lectpract = LectPract::create(['name_lectpract'=>$lectPract]);
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function add_post(Request $request){
            $post = $request->get('add_post');
            $post_find = Post::where('post_name', $post)->first();
            if (is_null($post_find)){
                $add_post = Post::create(['post_name'=> $post]);
                echo 1;
            }
            else{
                echo 0;
            }
        }
        public function add_time(Request $request){
            $time = $request->all();
            $time_find = Time::where('begin',$time['add_time_begin'])->where('finish',$time['add_time_finish'])->first();
            if (is_null($time_find)){
                $add_time = Time::create(['begin'=>$request->get('add_time_begin'), 'finish'=>$request->get('add_time_finish')]);
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function add_cabinets(Request $request){
            $cabinets = $request->all();
            $cabinets_find = Cabinets::where('num_cabinet', $cabinets['add_cabinets'])->first();
            if (is_null($cabinets_find)){
                $add_cabinets = Cabinets::create(['num_cabinet'=>$request->get('add_cabinets')]);
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function  add_pairs(Request $request){
            $pairs = $request->all();
            var_dump($request);
            $pairs_find = Pairs::where('subjects_id', $pairs['pairs_subject'])->where('user_id',$pairs['pairs_teacher'])->where('group_id',$pairs['pairs_group'])->first();
            if (is_null($pairs_find)){
                $add_pairs = Pairs::create(['subjects_id'=>$request->post('pairs_subject'), 'user_id'=>$request->post('pairs_teacher'),
                    'group_id'=>$request->post('pairs_group')]);
                echo 1;
            }
            else{
                echo 0;
            }

        }

        public function add_timetable(Request $request){
            $timetable = $request->all();
            $timetable_find = Timetable::where('pairs_id',$timetable['timetable_pairs'])
                ->where('lecture_practic_id', $timetable['timetable_lectpract'])->where('dayofweek_id',$timetable['timetable_dayofweek'])
                ->where('time_id',$timetable['timetable_time'])->where('cabinets_id',$timetable['timetable_cabinets'])->first();
            if (is_null($timetable_find)){
                $add_timetable = Timetable::create(["pairs_id"=>$request->post('timetable_pairs'),
                    'lecture_practic_id'=>$request->post('timetable_lectpract'),'dayofweek_id'=>$request->post('timetable_dayofweek'),
                    'time_id'=>$request->post('timetable_time'),'cabinets_id'=>$request->post('timetable_cabinets')]);
                echo 1;
            }
            else{
                echo 0;
            }
        }

        public function registration_teacher(Request $request){
            $teacher = $request->all();
            $teacher_find = User::where('email',$teacher['email_teacher'])->first();
            if (is_null($teacher_find)){
                if ($teacher['password_teacher']==$teacher['password_conf_teacher']){
                    $teacher_reg = User::create(["lastname" => $request->post('lastname_teacher'), "name" => $request->post('name_teacher'),
                        "patronymic" => $request->post('patronymic_teacher'), "birthday" => date("Y.m.d", strtotime($request->post('birthday_teacher'))),
                        "gender" => $request->post('gender_teacher'), "email" => $request->post('email_teacher'),"post_id"=>$request->post('post_teacher'),"role_id"=>2,
                        "login" => $request->post('login_teacher'), "password" =>hash('ripemd160',$request->post('password_teacher'))]);
                }
                else {
                    echo "Пароли не совпадают!";
                }
            }
            else{
                echo "Такая почта уже существует!";
            }
        }

        public function delete_user(Request $request){
            $user = $request->all();
            $user_delete = User::where('id_user',3)->delete(['id_user',$user['user_id']]);
            echo "Пользователь успешно удален!";
        }

        public function edit(Request $request){
            $user = User::find($request->post('user_id'));
            $gr = $user->group_id;
            $group = Group::find($gr);
            $post_find = $user->post_id;
            $post = Post::find($post_find);
            $role_find = $user->role_id;
            $role = Role::find($role_find);
            $gender = $user->gender;
            if ($gender==1){
                $g="Женский";
                return view('admin_user_show',['user'=>$user, 'gender'=>$g, 'post'=>$post, 'role'=>$role, 'group'=>$group]);
            }
            if ($gender==2){
                $g="Мужской";
                return view('admin_user_show',['user'=>$user,  'gender'=>$g, 'post'=>$post, 'role'=>$role, 'group'=>$group]);
            }
            //return view('admin_user_show',['user'=>$user]);
        }
        public  function update_user(Request $request){
            $user_profile = $request->all();
            $id_user = 2;
            $user = User::where('id_user',$id_user)->first();
            $user_email = User::where('email',$user_profile['email'])->first();

            if ($user_email['email']==$user_profile['email'] && $user_email['id_user']==$id_user){
                $user_update = User::where('id_user', $id_user)->update(['lastname'=>$user_profile['lastname'],
                    'name'=>$user_profile['name'], 'patronymic'=>$user_profile['patronymic'],'birthday'=>date("Y.m.d", strtotime($user_profile['birthday'])),
                    'login'=>$user_profile["login"],'password'=>$user_profile['password'],'email'=>$user_profile["email"],
                    'role_id'=>$user_profile['role'],'group_id'=>$user_profile['group']
                ]);
                echo "Данные успешно изменены";
            }
            elseif ($user['id_user']==$id_user){
                $user_update = User::where('id_user', $id_user)->update(['lastname'=>$user_profile['lastname'],
                    'name'=>$user_profile['name'], 'patronymic'=>$user_profile['patronymic'],'birthday'=>date("Y.m.d", strtotime($user_profile['birthday'])),
                    'login'=>$user_profile["login"],'password'=>$user_profile['password'],'email'=>$user_profile["email"],
                    'role_id'=>$user_profile['role'],'group_id'=>$user_profile['group']
                ]);
                echo "Данные успешно изменены";
            }
        }

        public function delete_role(Request $request)
        {
            $role = $request->all();
            $role_find = Role::where('role_name',$role['del_role'])->first();
            if (is_null($role_find)){
                echo "Такой роли не существует!";
            }
            else{
                $role_del = Role::where('role_name',$role['del_role'])->delete('role_name');
                echo "Роль удалена!";
            }
        }

        public function  delete_subject(Request $request)
        {
            $subject = $request->all();
            $subject_find = Subjects::where('name_subject',$subject['del_subject'])->first();
            if (is_null($subject_find)){
                echo "Такого предмета не существует!";
            }
            else{
                $subject_del = Subjects::where('name_subject',$subject['del_subject'])->delete('name_subject');
                echo "Предмет удален!";
            }
        }

        public  function  delete_cabinet(Request $request)
        {
            $cabinet = $request->all();
            $cabinet_find = Cabinets::where('num_cabinet', $cabinet['del_cabinet'])->first();
            if (is_null($cabinet_find)){
                echo "Кабинета не существует!";
            }
            else{
                $cabinet_del = Cabinets::where('num_cabinet',$cabinet['del_cabinet'])->delete('num_cabinet');
                echo "Кабинет удален!";
            }
        }

        public function delete_lectPract(Request $request)
        {
            $lectpract = $request->all();
            $lectpract_find = LectPract::where('name', $lectpract['del_lectpract'])->first();
            if (is_null($lectpract_find)){
                echo "Такой лекции/практики не существует!";
            }
            else{
                $lectpract_del = LectPract::where('name',$lectpract['del_lectpract'])->delete('name');
                echo "Лекция/Практика удалена!";
            }
        }

        public  function  delete_post(Request $request){
            $post = $request->all();
            $post_find = Post::where('post_name', $post['del_post'])->first();
            if (is_null($post_find)){
                echo "Должности не существует!";
            }
            else{
                $post_del = Post::where('post_name',$post['del_post'])->delete('post_name');
                echo "Должность удалена!";
            }
        }

        public  function  delete_pairs(Request $request){
            $pairs = $request->all();
            $pairs_find = Pairs::where('subjects_id', $pairs['del_subject'])->where('user_id', $pairs['del_user'])
                ->where('group_id', $pairs['del_group'])->first();
            if (is_null($pairs_find)){
                echo "Пары не существует!";
            }
            else{
                $pair_del = Pairs::where('subjects_id', $pairs['del_subject'])->where('user_id', $pairs['del_user'])
                    ->where('group_id', $pairs['del_group'])->delete('subjects_id','user_id','group_id');
                echo "Пара удалена!";
            }
        }

        public  function  delete_time(Request $request){
            $time = $request->all();
            $time_find = Time::where('begin', $time['delete_time_begin'])->where('finish', $time['delete_time_finish'])
                ->first();
            if (is_null($time_find)){
                echo "Времени не существует!";
            }
            else{
                $pair_del = Time::where('begin', $time['delete_time_begin'])->where('finish', $time['delete_time_finish'])
                    ->delete('begin','finish');
                echo "Время удалено!";
            }
        }

        public function delete_timetable(Request $request){
            $timetable = $request->all();
            $timetable_find = Timetable::where('pairs_id',$timetable['del_timetable_pairs'])
                ->where('lecture_practic_id', $timetable['del_timetable_lectpract'])->where('dayofweek_id',$timetable['del_timetable_dayofweek'])
                ->where('time_id',$timetable['del_timetable_time'])->where('cabinets_id',$timetable['del_timetable_cabinets'])->first();
            if (is_null($timetable_find)){
                echo "Расписания не существует!";
            }
            else{
                $pair_del = Timetable::where('pairs_id',$timetable['del_timetable_pairs'])
                    ->where('lecture_practic_id', $timetable['del_timetable_lectpract'])->where('dayofweek_id',$timetable['del_timetable_dayofweek'])
                    ->where('time_id',$timetable['del_timetable_time'])->where('cabinets_id',$timetable['del_timetable_cabinets'])
                    ->delete('pairs_id','lecture_practic_id','dayofweek_id','time_id', 'cabinets_id');
                echo "Расписание удалено!";
            }
        }

        public function getSubject(Request $request){
            $subject = Subjects::all();
            return $subject;
        }

}
