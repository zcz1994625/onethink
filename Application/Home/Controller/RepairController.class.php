<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/27
 * Time: 14:37
 */

namespace Home\Controller;


class RepairController extends HomeController
{
    public function index(){
        $rows = M('Repair')->select();

        //$rows   =   $this->lists('Repair');
        //int_to_string($rows, array('type'=>C('HOOKS_TYPE')));


        $this->assign('rows',$rows);

        $this->display();

    }

    public function add(){
        if(IS_POST){
            $Repair = M('Repair');
            $data = $Repair->create();
            if($data){
                $Repair->repair_time = time();
                $Repair->sn = rand(1000,9999);
                $id = $Repair->add();
                if($id){
                    $this->success('添加成功',U('index'));
                    //action_log('update_repair', 'repair', $id, UID);
                }else{
                    $this->error('新增失败');
                }
            }else{
                $this->error($Repair->getError());
            }
        }else{
            $this->display();
        }
    }
}