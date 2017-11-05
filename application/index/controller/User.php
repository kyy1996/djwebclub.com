<?php

namespace app\index\controller;

use app\common\model\Activities;
use app\common\model\Member;
use Spipu\Html2Pdf\Html2Pdf;
use think\Request;

class User extends base
{
    private $public_url = [
        "register", "login", "checkEmail"
    ];

    protected function _initialize()
    {
        parent::_initialize();
        if (!$this->user) {
            //未登录
            if (!in_array(request()->action(), $this->public_url)) $this->redirect("login");
        }
    }

    /**
     * 用户中心首页
     * @return mixed
     */
    public function index()
    {
        $_info = Member::get($this->user['uid'], "profile");
        if (!$_info->profile) {
            $_info->profile()->save([]);
            //            $_info = $_info->with("profile");
            $_info = Member::get($this->user['uid'], "profile");
        }

        $Model = new Activities();
        $_activities_timetable = $Model->timetable($_info->activities());
        $ass['_activities_timetable'] = $_activities_timetable;
        $ass['_info'] = $_info;
        $this->assign($ass);

        return $this->fetch();
    }

    /**
     * 用户登录
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        if ($request->isPost()) {
            /*if (($error = $this->validate($request->post(), ['username' => 'token'])) !== true) $this->error($error);*/
            $username = $request->post("username");
            $password = $request->post("password");
            $model = new Member;
            $result = $model->login($username, $password);
            if ($result < 0) $this->error($model->getError());
            $this->redirect("user/index");
        }
        if ($this->user) $this->redirect("index");

        return $this->fetch();
    }

    /**
     * 注销
     */
    public function logout()
    {
        $Model = new Member;
        $Model->logout();
        $this->success("注销成功", "index/index/index");
    }

    /**
     * 用户注册
     * @param Request $request
     * @return mixed
     */
    public function register(Request $request)
    {
        if (!$request->isPost()) {
            $data = $request->only(["username", "callback", "password"]);
            $user = Member::get(["email" => $data["username"]]);
            if ($user) $this->error("E-Mail：{$data["username"]} 已被注册");
            $this->assign("_info", $data);
        } else {
            $data = array_map("trim", $request->request());
            $profile = array_map("trim", $request->only(["school", "stu_no", "class", "name"]));
            if (($validate =
                    $this->validate($data, \app\common\validate\Member::class)) !== true) $this->error($validate);
            $data['status'] = 1;
            $member = Member::create($data, true);
            if (!$member) $this->error($member->getError());
            if (!$member->profile()->save($profile)) $this->error($member->getError());
            $this->success("注册成功", "user/index");
        }

        return $this->fetch();
    }

    /**
     * 检查E-Mail是否可用
     * @param Request $request
     */
    public function checkEmail(Request $request)
    {
        $data = $request->only(["email"]);
        if (Member::get(["email" => $data["email"]])) $this->error("E-Mail 已被占用");
        $this->success("该 E-Mail 可用");
    }

    /**
     * 更新用户信息
     * @param Request $request
     */
    public function update(Request $request)
    {
        $data = array_map("trim", $request->request());
        $profile = array_map("trim", $request->only(["uid", "school", "stu_no", "class", "name"]));
        if (($validate = $this->validate($data, \app\common\validate\Member::class)) !== true) $this->error($validate);
        $data['status'] = 1;
        if (key_exists("uid", $data) && +$data['uid']) $member = Member::get($data['uid']);
        else $member = Member::create($data, true);
        if (!$member) $this->error($member->getError());
        if (!$member->profile()->save($profile)) $this->error($member->getError());
        $this->success("注册成功", "user/index");
    }

    /**
     * 打印证明文件
     */
    public function printProof()
    {
        $_info = $this->checkStudent();
        $this->assign(compact("_info"));

        return $this->fetch();
    }

    /**
     * 下载证明文件
     */
    public function downloadProof()
    {
        $_info = $this->checkStudent();
        $html2pdf = new Html2Pdf('P', 'A4', 'en');
        $html2pdf->setDefaultFont('milt_rg');
        $this->assign("_info", $_info);
        $html2pdf->writeHTML($this->fetch());
//        $html2pdf->output('社团活动证明.pdf', "D");
        $html2pdf->output('社团活动证明.pdf', "D");
        exit();
    }

    /**
     * 生成证明之前检查用户信息
     * @throws \think\exception\HttpResponseException
     * @return null|Member
     */
    protected function checkStudent()
    {
        $count = 1;
        $member = Member::get($this->user['uid'], "profile");
        if (!$member->stu_no || !$member->name || !$member->class) $this->error("您不是上海电机学院在校生或个人信息不完整，无法生成学分证明");
        if ($member->checkin->count() < $count) $this->error("您的活动参与次数少于{$count}次，请继续努力参加社团活动吧");

        return $member;
    }
}
