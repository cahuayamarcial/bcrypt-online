<?php  
/* Helpers */

use Illuminate\Support\Facades\Auth;
use App\Log;
use Carbon\Carbon;

function storeLog($detail, $ip)
{
	$log          = new Log();
    $log->detail  = $detail;
    $log->ip      = $ip;
    $log->user_id = Auth::user()->id;
    $log->save();
}

// Alerts
function displayAlert()
{
	if (Session::has('alert'))
	{
		list($type, $title, $content) = explode('|', Session::get('alert'));
		return sprintf("%s('%s', '%s')", $type, $title, $content);
	}
	return '';
}

// months in Spanish
function months(){
    $months = [
        '01' => 'Enero', 
        '02' => 'Febrero', 
        '03' => 'Marzo', 
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiempre',
        '10' => 'Octubre', 
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];
    return $months;
}

function monthsPassed($valuekey = null){
    $allMonths = months();
    $months = [];
    foreach ($allMonths as $key => $month) {
        if($key <= Carbon::now()->format('m')){
            if(empty($valuekey)){
            	$months[] = $month;
            }else{
            	$months[$key] = $month;
            }
        }
    }
    return $months;
}

function countMonth($query){
	$months = monthsPassed('key');
	$data = [];
	foreach ($query as $_key => $q) {
        foreach ($months as $key => $value) {
            if($key == $q->mes){
                $data[$key] = $q->total;
            }elseif(!isset($data[$key])){
            	$data[$key] = 0;
            }
        }
    }
    return array_values($data);
}


?>