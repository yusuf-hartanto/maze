<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MazeController extends Controller
{
    public function generate(Request $request)
    {
        $result = '';
        $door = 'left';
        $suku = $request->suku;
        
        if($this->cek($suku) || $suku == '3'){
            return $this->response($suku, 'failed', false);
        }

        for($lineX = 1; $lineX <= $suku; $lineX++){
            $result .= '<div style="height:20px;"><span>@</span>';
            
            if($lineX % 2 > 0){
            for($lineY = 1; $lineY <= ($suku - 2); $lineY++){
                if($door == 'left' && $lineY == 1){
                    $result .='<label style="min-width:15.28px;">&nbsp;</label>';
                }else if($door=='right' && $lineY == ($suku - 2)){
                    $result .='<label style="min-width:15.28px;">&nbsp;</label>';  
                }else{
                    $result .='<span>@</span>';
                }
            }
            
            if($door == 'left'){
                $door = 'right';
            }else{
                $door = 'left';
            }

            }else{
                for($lineY = 1; $lineY <= ($suku -2); $lineY++){
                    $result .= '<label style="min-width:15.28px;">&nbsp;</label>';
                }
            }
            
            $result .= '<span>@</span></div>';
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
