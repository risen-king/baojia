<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\helper;

/**
 * Description of Tree
 *
 * @author Administrator
 */
class Tree {
    
    /**
    * 获取子孙树
    * @param   array        $data   待分类的数据
    * @param   int/string   $pid     要找的子节点id
    * @param   int          level    节点等级
    */
    public static  function getTree(&$data,$pid=0,$level=0,$html='|----'){
        
        static $treeList = [];
        
        foreach($data as $k=>$v){
            if($v['pid'] == $pid){
                $v['level'] = $level + 1;
                $v['html'] = str_repeat($html, $level);
                
                $treeList[$v['id']] = $v;
                
                unset($data[$k]);
                
                static::getTree($data,$v['id'],$v['level']);
            }
        }
        return $treeList;
    }
    
    
    public static function getSubTree(&$data , $id = 0) {
        $task = array($id);                          # 栈 任务表
        $son = array();

        while(!empty($task)) {
            $flag = false;                           # 是否找到节点标志
            foreach($data as $k => $v) {

                # 判断是否是子孙节点的条件 与 递归方式一致
                if($v['pid'] == $id) {
                    $son[] = $v;                     # 节点存入数组
                    array_push($task , $v['id']);    # 节点id入栈
                    $id = $v['id'];                  # 判断条件切换
                    unset($data[$k]);                # 删除节点
                    $flag = true;                    # 找到节点标志
                }
            }

            # flag == false说明已经到了叶子节点 无子孙节点了
            if($flag == false) {
                array_pop($task);                    # 出栈
                $id = end($task);                    # 寻找栈顶id的子节点
            }
        }
        return $son;
    }
    
    /**
    * 获取家谱树
    * @param   array        $data   待分类的数据
    * @param   int/string   $pid    要找的祖先节点
    */
    public static function getAncestry(&$data , $pid) {
        $ancestry = array();

        while($pid > 0) {
            foreach($data as $v) {
                if($v['id'] == $pid) {
                    $ancestry[] = $v;

                    $pid = $v['pid'];
                }
            }
        }

        return $ancestry;
    }
    
    /**
    * 获取家谱树
    * @param   array        $data   待分类的数据
    * @param   int/string   $pid    要找的祖先节点
    */
   public static function getAncestry2(&$data , $pid) {
       static $ancestry = array();

       foreach($data as $value) {
           if($value['id'] == $pid) {
               $ancestry[] = $value;

               static::getAncestry2($data , $value['pid']);
           }
       }
       return $ancestry;
   }
}
