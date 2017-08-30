<?php
class  Datetime{
     
    
    //获取本月日期
    public static function currMonth($date){
        $firstday =  date("Y-m-01",strtotime($date));
        $lastday =   date("Y-m-d",strtotime("$firstday +1 month -1 day"));
        
        return [$firstday,$lastday];
    }
    
    //获取上月日期
    public static function prevMonth($date){
        $timestamp=strtotime($date);
        $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));
        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        return [$firstday,$lastday];
    }
    
    
    
    //获取下月日期
    function nextMonth($date){
        $timestamp=strtotime($date);
        $arr=getdate($timestamp);
        if($arr['mon'] == 12){
            $year=$arr['year'] +1;
            $month=$arr['mon'] -11;
            $firstday=$year.'-0'.$month.'-01';
            $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        }else{
            $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)+1).'-01'));
            $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        }
        return [$firstday,$lastday];
    }
    
    public function  currWeek($date){
        //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期
        $first=1; 
        $sDate = date("Y-m-d",$date); 
        
        //获取当前周的第几天 周日是 0 周一到周六是 1 - 6
        $w=date('w',$date);
        //获取本周开始日期，如果$w是0，则表示周日，减去 6 天
        $week_start=date('Y-m-d',strtotime("$sDate -".($w ? $w - $first : 6).' days'));
        //本周结束日期
        $week_end=date('Y-m-d',strtotime("$week_start +6 days"));
        return [$week_start,$week_end];
    }

}
 

