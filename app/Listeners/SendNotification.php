<?php

namespace App\Listeners;

use App\Events\NotificationDevice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Notification;

class SendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NotificationDevice  $event
     * @return void
     */
    public function handle(NotificationDevice $event)
    {
        $user = User::where('id', $event->user_id)->first();
       
        if($user){
            
            $data = [
                'title' => $event->title ?? '-',
                'body' => $event->message ?? '-',
                
                'sound'=>'notification.wav',
               
                
            ];

            $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
          
            
                $device_token=$user->device_token;
              
                if($device_token){
                   
                    $mergedTokens = [$device_token];
                    $serverKey = 'AAAAEoqGeKA:APA91bHiQKiE64gCqyAgtNatRCE_DQN6hlovX_nIoNZ2QA4_N20_OkgFPcQKU26R-FBObDfpQcFhe5HX6-afkgssRVqBiQpFBQXJpIrBm_-3OsSr-VJHVSVTXUnmsJ1gwyWxzALB5rn9';
                    $fcmData = [
                        "registration_ids" => $mergedTokens,
                        "notification" => [
                            "title" => $event->title,
                            "body" => $event->message,
                           
                            'sound'=>'notification.wav'
                           
                        ],
                        "data"=>[
                            "title" => $event->title,
                            "body" => $event->message,
                           
                            'sound'=>'notification.wav'
                        ],
                        
                    ];
                  
                    $encodedData = json_encode($fcmData);
                   
                    $headers = [
                        'Authorization:key=' . $serverKey,
                        'Content-Type: application/json',
                    ];
        
                    $ch = curl_init();
        
                    curl_setopt($ch, CURLOPT_URL, $fcmUrl);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                    // Disabling SSL Certificate support temporarly
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
                    // Execute post
                    $result = curl_exec($ch);
                   
                    if ($result === FALSE) {
                        die('Curl failed: ' . curl_error($ch));
                    }
                   
                    // Close connection
                    curl_close($ch);
                    // FCM response
                    // dd($result);
     
                    
                        return true;
                    

                }
        }
                
        
    }
}