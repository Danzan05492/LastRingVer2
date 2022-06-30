<?php
namespace App\Models;
/**
 * Модель для генерации базовых настроек УДО
 */
use App\Models\Freedom;
use App\Models\Node;
use App\Models\Point;
class CalendarSettings 
{   
    /**
     * Количество дней через которые нужно посещать
     * @var int
     */
    public $visitPeriod=90;
    /**
    * Количество "переодических" посещений
    * @var int  
    */
    public $checkCount=1;
    /**
     * Нужно ли отправлять данные в военкомат
     * @var bool 
     */
    public $sendVoenkom=false;
    /**
     * Нужно ли посещать врача
     * @var bool
     */
    public $doctorVisit=false;
    /**
     * Массив с предполагаемыми точками по датам
     * @var array<int|Point>
     */
    public $points=array();    
    /**
     * Метод возвращает готовый объект
     *
     * @param  \App\Models\Freedom  $freedom
     * @return \App\Models\CalendarSettings
     */
    public static function makeSettings(Freedom $freedom){
        $result=new CalendarSettings();                
        $result->formArray($freedom);
        return $result;
    }
    /**
     * Метод заполняет массив узлов
     * @param  \App\Models\Freedom  $freedom
     * @return void
     */
    public function formArray(Freedom $freedom){
        //обнуляем массив точек
        $this->points=array();
        //подготовительный этап
        $point_time=$freedom->startdate;
        for($i=1;$i<=3;$i++){
            $point=new Point();
            $point->freedom_id=$freedom->id;
            $point->startdate=$point_time;
            $point->enddate=$point_time;
            $point->status=Point::INPROGRESS;
            $node=Node::where('slug','preparation_step_'.$i)->first();            
            $point->node_id=$node->id;
            $point_time = date("Y-m-d H:i:s", strtotime("+30 minute", strtotime($point_time)));
            array_push($this->points,$point);
        }
        //военкомат
        if ($freedom->condemned->inTheArmy()){
            $point=new Point();
            $point->freedom_id=$freedom->id;
            $point->startdate=$point_time;
            $point->enddate=$point_time;
            $point->status=Point::INPROGRESS;
            $node=Node::where('slug','prepararion_step_3_1')->first();            
            $point->node_id=$node->id;
            $point_time = date("Y-m-d H:i:s", strtotime("+30 minute", strtotime($point_time)));
            array_push($this->points,$point);
        }
        //Приглашаем
        $point_time = date("Y-m-d H:i:s", strtotime("+1 days", strtotime($freedom->startdate)));
        $point=new Point();
        $point->freedom_id=$freedom->id;
        $point->startdate=$point_time;
        $point_time = date("Y-m-d H:i:s", strtotime("+10 days", strtotime($freedom->startdate)));
        $point->enddate=$point_time;
        $point->status=Point::INPROGRESS;
        $node=Node::where('slug','preparation_step_4')->first();            
        $point->node_id=$node->id;
        array_push($this->points,$point);
        //первая беседа        
        $point=new Point();
        $point->freedom_id=$freedom->id;
        $point->startdate=$point_time;
        $point_time = date("Y-m-d H:i:s", strtotime("+30 minute", strtotime($point_time)));
        $point->enddate=$point_time;
        $point->status=Point::INPROGRESS;
        $node=Node::where('slug','preparation_step_6')->first();            
        $point->node_id=$node->id;
        array_push($this->points,$point);
        //отправляем к врачу
        if ($freedom->condemned->illness->id>1){
            $point=new Point();
            $point->freedom_id=$freedom->id;
            $point_time = date("Y-m-d H:i:s", strtotime("+30 minute", strtotime($point_time)));
            $point->startdate=$point_time;            
            $point->enddate=$point_time;
            $point->status=Point::INPROGRESS;
            $node=Node::where('slug','preparation_step_6_1')->first();            
            $point->node_id=$node->id;
            array_push($this->points,$point);
        }
        //плановые проверки
        $end=strtotime($freedom->enddate);
        while(strtotime($point_time)<$end){
            $point=new Point();
            $point->freedom_id=$freedom->id;            
            $point->startdate=$point_time;  
            $point_time = date("Y-m-d H:i:s", strtotime("+".$this->visitPeriod." days", strtotime($point_time)));          
            $point->enddate=$point_time;
            $point->status=Point::INPROGRESS;
            $node=Node::where('slug','control_check')->first();            
            $point->node_id=$node->id;
            array_push($this->points,$point);
        }
        $point=new Point();
        $point->freedom_id=$freedom->id;            
        $point->startdate=$point_time;              
        $point->enddate=$point_time;
        $point->status=Point::INPROGRESS;
        $node=Node::where('slug','ending')->first();            
        $point->node_id=$node->id;
        array_push($this->points,$point);
    }
}
