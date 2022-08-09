<?php

namespace App\Http\Controllers;

use App\DtbUser;
use App\Group;
use App\GroupUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visitedpage = $request->fullUrl();
        if (!Session()->has('user_id')) {
            return redirect('login')->with('url', $visitedpage);
        }

        $current_user_id = 14 ; 
        $allUsers = DtbUser::all();
        $current_user_id = Session::get('user_id');
        if($current_user_id == 14){
        $allGroups = Group::whereNotNull('name')->get();
        }else {
            $allGroups = DB::select('SELECT g.name , g.id FROM groups g join groups_users u on g.id = u.group_id where u.user_id = '.$current_user_id.' UNION SELECT name, id FROM groups WHERE id = "1" ORDER BY id ASC ');
        }
        
        return view('messanger/messenger', compact('allUsers', 'allGroups'));
    }

    public function createGroup(Request $request)
    {
        $validatedData = $request->validate([
            'group_name' => 'required'
        ]);

        $group = Group::create([
            'name' => $request->group_name
        ]);

        $group_id = $group->id;

        $users = $request->users;
        if (!empty($users)) {

            foreach ($users as $user) {
                $group_user = GroupUser::create([
                    'group_id' => $group_id,
                    'user_id' => $user
                ]);
            }
        }

        return redirect('/messenger')->with('success', 'Group created Successfully !');
    }

    public function showMessages(Request $request)
    {
        $receiver_user_id = '';
        $sender_user_id = '';
        $group_id = '';
        $query = '';

        // dd(DtbUser::select('name')->where('id', 1)->get());

        // dd(\Request::getRequestUri());
        
        if (isset($_GET['sender_user_id']) && !empty($_GET['sender_user_id'])) {
            $sender_user_id =  $_GET['sender_user_id'];
        }

        if (isset($_GET['receiver_user_id']) && !empty($_GET['receiver_user_id'])) {
            $receiver_user_id =  $_GET['receiver_user_id'];
            $query = '( receiver_user_id = ' . $receiver_user_id . ' and sender_user_id = ' . $sender_user_id . ' ) 
            or  
            (receiver_user_id = ' . $sender_user_id . ' and sender_user_id = ' . $receiver_user_id . ' )';
        }
        else if (isset($_GET['group_id']) && !empty($_GET['group_id'])) {
            $group_id =  $_GET['group_id'];
            $query = '(group_id = ' . $group_id . '  )
            ';
        }

// <img src="'. $image->value('icon_image_path') == '' ? 'https://www.bootdey.com/img/Content/avatar/avatar3.png' : asset($image->value('icon_image_path'))  .'" alt="">

        $send_messages = DB::select('select * from messages where '.$query.'');

        $data = '';
        if ($request->ajax()) {
            if(empty($send_messages)){
                $data .= '
            <li class="text-center">
                <div class="">' . "No messages Yet !" . '
                </div>
                
            </li>';
            }
            foreach ($send_messages as $send_message) {

                    $image =  DtbUser::select('icon_image_path')->where('id', $send_message->sender_user_id);
                    $image_src = empty($image->value('icon_image_path'))  ? 'https://www.bootdey.com/img/Content/avatar/avatar1.png' : asset($image->value('icon_image_path'));
                    $name = ucfirst( DtbUser::select('name')->where('id', $send_message->sender_user_id)->value('name') );

                    $message = '';
                    $img_message = '';
                    $file_source = '';

                    if(empty($send_message->message) && !empty($send_message->file_location) ){

                        $file_source = asset($send_message->file_location) ;
                            $mime = mime_content_type($send_message->file_location);
                             if(strstr($mime, "image/")){
                                $img_message = asset($send_message->file_location);
                            }else {
                                $img_message = 'https://image.shutterstock.com/image-vector/document-icon-simbol-260nw-237613033.jpg';
                            }

                            $message = '<a target="_blank" href="'.$file_source.'" class="chat-container-img-preview">
                            <img src="'.$img_message.'" style"width:100% ; height:100%">
                        </a>';
                    }else {
                        $message = $send_message->message ; 
                    }

                if ($send_message->sender_user_id == Session::get('user_id')) {

                    $data .= '
                    <li class="chat-right">
                        <div class="chat-text">' . $message . '
                        </div>
                        <div class="chat-avatar"> 
                        <img src=" '. $image_src  .' " alt="">
                            <div class="chat-name">'.$name.'</div>
                        </div>
                    </li>';

                } 
                
                else {
                    $data .= '
                <li class="chat-left">
                <div class="chat-avatar">
                    <img src="'.$image_src.'"
                        alt="Retail Admin">
                    <div class="chat-name">'.$name.'</div>
                </div>
                <div class="chat-text">' . $message . '
                </div>
            </li>';
                }
            
            }

            return $data;
        }

        return view('messanger/messenger', compact('messages'));
    }

    public function sendMessage(Request $request)
    {

        if(!empty($request->receiver_user_id)){
            DB::table('messages')->insert([
                'message' =>  $request->message,
                'sender_user_id' =>  $request->sender_user_id,
                'receiver_user_id' =>  $request->receiver_user_id,
                'created_at' => Carbon::now()
            ]);
        }else if (!empty($request->group_id)){
            DB::table('messages')->insert([
                'message' =>  $request->message,
                'sender_user_id' =>  $request->sender_user_id,
                'group_id' =>  $request->group_id,
                'created_at' => Carbon::now()
            ]);
        }
        
    }

    public function sendFile(Request $request)
    {

        // if(isset($_FILES['file']['name'])){

            
        //     $filename = $_FILES['file']['name'];
         
            
        //     $location = "uploads/".$filename;
        //     $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        //     $imageFileType = strtolower($imageFileType);
         
           
        //     $valid_extensions = array("jpg","jpeg","png","pdf","docx","xlxs");
         
        //     $response = 0;
            
        //     if(in_array(strtolower($imageFileType), $valid_extensions)) {
              
            
        //        if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
        //           $response = $location;
        //        }
        //     }
         
        //     echo $response;
            
        //  }
         
        if ($request->hasFile('file')) {
        // dd($request->file);
        $location = 'uploads/'.time() . '-' . $request->file->getClientOriginalName();
        if($request->file->move(public_path('uploads'), $location)){
            $response = $location;
        }
        echo $response;
        }

        if(!empty($request->receiver_user_id)){
            DB::table('messages')->insert([
                'file_location' =>  $location,
                'sender_user_id' =>  $request->sender_user_id,
                'receiver_user_id' =>  $request->receiver_user_id,
                'created_at' => Carbon::now()
            ]);
        }else if (!empty($request->group_id)){
            DB::table('messages')->insert([
                'file_location' =>  $location,
                'sender_user_id' =>  $request->sender_user_id,
                'group_id' =>  $request->group_id,
                'created_at' => Carbon::now()
            ]);
        }

       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
