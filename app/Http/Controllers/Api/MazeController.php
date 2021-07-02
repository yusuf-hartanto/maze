<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MazeController extends Controller
{
    public function generate(Request $request)
    {
        $result = '';
        $suku = $request->suku;

        if($this->cek($suku)){
            return $this->response($suku, 'failed', false);
        }

        $repeat = $suku - 2;
        $left = "<span>@</span>"."<label style='min-width:15.28px;'>&nbsp;</label>".str_repeat("<span>@</span>", $repeat);
        $road = "<span>@</span>".str_repeat("<label style='min-width:15.28px;'>&nbsp;</label>", $repeat)."<span>@</span>";
        $right = str_repeat("<span>@</span>", $repeat)."<label style='min-width:15.28px;'>&nbsp;</label>"."<span>@</span>";
    
        $leftSts = true;
        $roadSts = false;
        $rightSts = false;
        $leftCount = 0;
        $rightCount = 0;
        
        for($j=0;$j<$suku;$j++){
            $result = $result."<div style='height:20px;'>";
            if($leftSts){
                $result = $result.$left;
                $leftSts = false;
                $roadSts = true;
                $leftCount++;
            } else if($roadSts){
                $result = $result.$road;
                if($leftCount == $rightCount){
                    $leftSts = true;
                } else {
                    $rightSts = true;	
                }
                $roadSts = false;
            } else if($rightSts){
                $result = $result.$right;
                $rightSts = false;
                $roadSts = true;
                $rightCount++;
            }
            $result = $result."</div>";
        }

        return $this->response($result);
    }

    public function cek($suku)
    {
        $n = ($suku+1)/4;
        if(!preg_match('/^\d+$/', $n)){
            return true;
        }
        return false;
    }
}
