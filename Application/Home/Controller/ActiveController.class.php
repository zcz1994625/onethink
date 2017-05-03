<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/28
 * Time: 15:36
 */

namespace Home\Controller;


class ActiveController extends HomeController
{
    public function index(){
        $document = D('Document');

        $list = $document->where(['category_id'=>43])->page(I('p',1),C('LIST_ROWS'))->select();
//        var_dump($list);exit;

        //循环遍历
        foreach($list as &$intro){
            $intro['create_time'] = date('Y-m-d H:i:s',$intro['create_time']);
            $intro['path'] = get_cover($intro['cover_id'],'path');
            $intro['url'] = U('detail',['id'=>$intro['id']])    ;
        }

        //判断是否是ajax请求
        if(IS_AJAX){
            if(empty($list)){
                $this->error('没有数据');
            }else{
                $this->success($list);
            }
        }

        $this->assign('list',$list);
        $this->display();
    }


    //详情查看
    public function detail($id){
        //var_dump($id);exit;
        $article = M('Document_article')->where(['id'=>$id])->find();
       // var_dump($article);exit;

        $info = M('Document')->where(['id'=>$id])->find();
//        var_dump($info);exit;
        $article['create_time'] = $info['create_time'];
        $article['name'] = $info['name'];

        $this->assign('article',$article);
        $this->display();
    }
}