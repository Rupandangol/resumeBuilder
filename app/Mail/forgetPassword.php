<?php

namespace App\Mail;

use App\Model\Backend\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class forgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = base64_encode(str_random(10));
        $admin=Admin::where('email', $this->email)->first();
        Admin::where('email',$this->email)->update(['reset_token' => $token]);
        $item=$admin->username;
        $url=url('reset/'.$token);
        return $this->view('Backend.mail.reset',compact('item'))->with('data',$url)->from('info@talentconnects.com.npclear');
    }
}
