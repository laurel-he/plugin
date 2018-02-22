<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Db;
use app\admin\controller\CUtf8_PY;
use think\Controller;
use think\Request;

/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Live extends Backend
{
    
    /**
     * Live模型对象
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Live');

    }
    public function index()
    {
//        $test = "分页输出列表";
//        $res= substr(CUtf8_PY::encode($test,$sRetFormat='head'),0,1);
//        echo $res;
//
//        die;
        // 分页输出列表 每页显示3条数据
        $list = Db::name('live')->where('del',0)->paginate(5);
        $page = $list->render();
        $total = $list->total();
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();

    }
 /*   public function list()
    {
        $list = Db::table('fa_live')->where('del',0)->select();
        $this->assign('list',$list);
    }*/
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个方法
     * 因此在当前控制器中可不用编写增删改查的代码,如果需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

}
