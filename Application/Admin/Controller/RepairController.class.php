<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/26
 * Time: 13:19
 */

namespace Admin\Controller;


class RepairController extends AdminController
{
    public function index(){
        $pid = I('get.pid', 0);

        $rows = M('Repair')->select();

        $this->assign('rows',$rows);

        $this->meta_title = '报修管理';

        $this->display();
    }

    public function add(){
        if(IS_POST){
            $Repair = D('Repair');
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
            $pid = I('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = M('repair')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }

            $this->assign('pid', $pid);
            $this->assign('info',null);
            $this->meta_title = '新增';
            $this->display('add');
        }

    }

    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('Repair')->where($map)->delete()){
            //记录行为
            //action_log('update_channel', 'channel', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

    public function edit($id = 0){
        if(IS_POST){
            $Repair = D('Repair');
            $data = $Repair->create();
            if($data){
                if($Repair->save()){
                    //记录行为
                    //action_log('update_channel', 'channel', $data['id'], UID);
                    $this->success('编辑成功', U('index'));
                } else {
                    $this->error('编辑失败');
                }

            } else {
                $this->error($Repair->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('Repair')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }

            $pid = I('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = M('Repair')->where(array('id'=>$pid))->field('title')->find();
                $this->assign('parent', $parent);
            }

            $this->assign('pid', $pid);
            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            $this->display();
        }
    }
}