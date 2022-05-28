function closestNumbers($arr) {
    // Write your code here
    sort($arr);
   
    $process_arr = [];
    for ($x = 0; $x < count($arr); $x++) {
        for ($y = 0; $y < count($arr); $y++) {
            if ($x != $y) {
                $diff_val = abs($arr[$x] - $arr[$y]);
                $key = $arr[$x] . "_" . $arr[$y];
                $reverted_key = $arr[$y] . "_" . $arr[$x];
               
                $is_exist = false;
                for ($z = 0; $z < count($process_arr); $z++) {
                    if ($process_arr[$z]['key'] == $key 
                        || $process_arr[$z]['key'] == $reverted_key)        {
                        $is_exist = true;
                    }
                }
               
                if (!$is_exist) {
                    $process_arr[] = ['key' => $key, 'value' => $diff_val];
                }
            }
        }
    }
   
    //sorting process arr
    usort($process_arr, function ($a, $b) {
        return $a['value'] - $b['value'];
    });
   
    //return for result
    $result_arr = [];
    for ($i = 0; $i < count($process_arr); $i += 1) {
        $key = explode('_', $process_arr[$i]['key']);
        
        $result_arr[] = [
            'first' => $key[0],
            'seconde' => $key[1],
            'value' => $process_arr[$i]['value'],
        ];
    }

}