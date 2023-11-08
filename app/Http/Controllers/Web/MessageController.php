<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function messages(Request $request)
    {
        return view('school.message.list');
    }

    public function inbox()
    {
        $buses = Bus::select('id', 'registration_number as name', 'image')
            ->selectRaw('"test" as message , created_at as time')
            ->when(auth()->user()->role == "parent", function ($parent) {
                return $parent
                    ->whereRaw(' id in (select buses.id from users  join buses on buses.driver_id = 
                                            users.driver_id where users.parent_id = "' . auth()->id() . '" group by buses.id) ');
            })
            ->when(auth()->user()->role == "driver", function ($driver) {
                return $driver
                    ->where('driver_id', auth()->id());
            })
            ->get();


        $buses = collect(DB::select('SELECT t1.chat_message as message, id,registration_number as name, image, 
                                        CASE
                                            WHEN TIMESTAMPDIFF(SECOND, t1.created_at, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(SECOND, t1.created_at, NOW()), " sec ago")
                                            WHEN TIMESTAMPDIFF(MINUTE, t1.created_at, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(MINUTE, t1.created_at, NOW()), " min ago")
                                            WHEN TIMESTAMPDIFF(HOUR, t1.created_at, NOW()) < 24 THEN CONCAT(TIMESTAMPDIFF(HOUR, t1.created_at, NOW()), " hours ago")
                                            ELSE CONCAT(TIMESTAMPDIFF(DAY, t1.created_at, NOW()), " days ago")
                                        END AS time_ago
                                        FROM `chats` AS t1 LEFT OUTER JOIN `chats` AS t2 ON t1.chat_group_id = t2.chat_group_id 
                                        AND t1.chat_id < t2.chat_id RIGHT JOIN buses ON buses.id = t1.chat_group_id WHERE t2.chat_group_id IS NULL AND buses.school_id = "'.auth()->id().'"
                                         ORDER BY t1.chat_id desc;'));
        
        return apiSuccessMessage("Chat List", $buses);
    }
}
