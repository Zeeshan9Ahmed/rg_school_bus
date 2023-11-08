<?php


namespace App\Services\Notifications;


use Carbon\Carbon;

class PushNotificationService
{




    public function execute($data, $token)
    {

        $message = $data['title'];
        $date = Carbon::now();
        $header = [
            'Authorization: key= AAAAyFsjBec:APA91bHmMHL3LZHjdgFfXjM3W7lqf2Ivhf7PC2hhg83JwerymnNJ5IccycD-ws3duPD7qMEjijWdWOo5nDUV1kKsfDxTLb_rZNeII9JtmhJZnLgVg5gQABHk-eT_wBd1ZASAEuNZ_TuZ',
            'Content-Type: Application/json'
        ];
        $notification = [
            'title' => 'RG SCHOOL BUS',
            'body' =>  $message,
            'icon' => '',
            'image' => '',
            'sound' => 'default',
            'date' => $date->diffForHumans(),
            'content_available' => true,
            "priority" => "high",
            'badge' => 0
        ];
        if (gettype($token) == 'array') {
            $payload = [
                'registration_ids' => $token,
                'data' => (object)$data,
                'notification' => (object)$notification
            ];
        } else {
            $payload = [
                'to' => $token,
                'data' => (object)$data,
                'notification' => (object)$notification
            ];
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => $header
        ));
        // return true;


        $response = curl_exec($curl);
        $d  = ['res' => $response, 'data' => $data];

        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
