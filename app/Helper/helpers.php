<?php
function generalSetting(){
    return App\Models\Application::first();
}


if (!function_exists('send_bl_sms')) {
    function send_bl_sms($phone, $message)
    {
        $msisdn=trim($phone);
        $n = strlen($msisdn);
        if ($n==11){
            $msisdn = '88' . $msisdn;
        }
        
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . '328|eRQViXjKF7RaVu6egXpq0aTKslOXbg2BRBU66abW',
        ])->post("https://login.esms.com.bd/api/v3/sms/send", [
            'recipient' => $msisdn,
            'sender_id' => "8809617620593",
            'type' => "plain",
            // 'schedule_time' => $schedule_time,
            'message' => $message,
        ]);
         return $response;
    }
}