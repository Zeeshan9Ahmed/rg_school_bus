<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendanceStatus;
use App\Models\Bus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function chatList () {
        $role = auth()->user()->role;
        $buses = collect(DB::select('SELECT t1.chat_message as message, id,registration_number as name, image, 
                                        CASE
                                            WHEN TIMESTAMPDIFF(SECOND, t1.created_at, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(SECOND, t1.created_at, NOW()), " sec ago")
                                            WHEN TIMESTAMPDIFF(MINUTE, t1.created_at, NOW()) < 60 THEN CONCAT(TIMESTAMPDIFF(MINUTE, t1.created_at, NOW()), " min ago")
                                            WHEN TIMESTAMPDIFF(HOUR, t1.created_at, NOW()) < 24 THEN CONCAT(TIMESTAMPDIFF(HOUR, t1.created_at, NOW()), " hours ago")
                                            ELSE CONCAT(TIMESTAMPDIFF(DAY, t1.created_at, NOW()), " days ago")
                                        END AS time_ago
                                        FROM `chats` AS t1 LEFT OUTER JOIN `chats` AS t2 ON t1.chat_group_id = t2.chat_group_id 
                                        AND t1.chat_id < t2.chat_id RIGHT JOIN buses ON buses.id = t1.chat_group_id WHERE t2.chat_group_id IS NULL AND
                                        CASE WHEN "'.$role.'" = "parent" THEN buses.id IN (select buses.id from users  join buses on buses.driver_id = 
                                            users.driver_id where users.parent_id = "'.auth()->id().'" group by buses.id)
                                            ELSE buses.driver_id = "'.auth()->id().'"
                                            END    
                                        
                                         ORDER BY t1.chat_id desc;'));
        
        


        return apiSuccessMessage("Chat List", $buses);
    }

    public function chat($user_id) {

        // dd($user_id);
        $get_chat_list_1 = DB::table('chats')->select(
            'users.id',
            'users.first_name',
            'users.last_name',
            'users.avatar',
            'users.role',
            'chats.chat_id',
            DB::raw('(select chat_message  from chats as st where st.chat_id = chats.chat_id order by st.chat_id desc limit 1) as chat_message'),
            DB::raw('(select chat_sender_id  from chats as st where st.chat_id = chats.chat_id order by st.chat_id desc limit 1) as sender_id'),
            DB::raw('(select chat_type  from chats as st where st.chat_id = chats.chat_id order by st.chat_id desc limit 1) as chat_type'),
            // 'chats.created_at'
        )
        ->selectRaw('DATE_FORMAT(chats.created_at, "%M %d, %Y") as created_at' )
            ->leftJoin('users', 'users.id', '=', 'chats.chat_reciever_id')
            ->whereRaw('( chat_id in (select MAX(chat_id) from chats where chats.chat_sender_id = "' . $user_id . '" group by chat_sender_id , chat_reciever_id )  )');

        $get_chat_list_2 = DB::table('chats')->select(
            'users.id',
            'users.first_name',
            'users.last_name',
            'users.avatar',
            'users.role',
            'chats.chat_id',
            DB::raw('(select chat_message  from chats as st where st.chat_id = chats.chat_id order by st.chat_id desc limit 1) as chat_message'),
            DB::raw('(select chat_sender_id  from chats as st where st.chat_id = chats.chat_id order by st.chat_id desc limit 1) as sender_id'),
            DB::raw('(select chat_type  from chats as st where st.chat_id = chats.chat_id order by st.chat_id desc limit 1) as chat_type'),
            // 'chats.created_at'
        )
        ->selectRaw('DATE_FORMAT(chats.created_at, "%M %d, %Y") as created_at' )

            ->leftJoin('users', 'users.id', '=', 'chats.chat_sender_id')
            ->whereRaw('( chat_id in (select MAX(chat_id) from chats where chats.chat_reciever_id = "' . $user_id . '" group by chat_sender_id , chat_reciever_id )  )')
            ->union($get_chat_list_1);
        // return;
        $groupby = DB::query()->fromSub($get_chat_list_2, 'p_pn')
            ->select(
                'id',
                'first_name',
                'last_name',
                'avatar',
                'role',
                'chat_id',
                'sender_id',
                'chat_message',
                'chat_type',
                'created_at'
            )
            ->orderBy('chat_id', 'desc')
            ->get();

        
        $data = [];

        foreach (collect($groupby)->groupBy('id') as $result) {
                $data[] = $result[0];
            
        }
        return $data;
    }

    public function reset (Request $request) {
        Cache::forget('user_' . $request->driver_id);

        return AttendanceStatus::whereDate('date', Carbon::today())
        ->update([
            'home_pickup_time' => null,
            'home_drop_off_time' => null,
            'school_pick_up_time' => null,
            'school_drop_off_time' => null,
        ])
        ;
    }
}
