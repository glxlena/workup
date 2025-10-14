<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MessagesController extends Controller
{
    public function sendEmail(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);
    
        $sender = auth()->user();
        $content = $request->message;
    
        Mail::send([], [], function ($mail) use ($user, $sender, $content) {
            $mail->to($user->email)
                 ->subject('Contato pelo WorkUP')
                 ->from('workup.ltda@gmail.com', 'WorkUP')
                 ->replyTo($sender->email, $sender->name);
            $logoPath = public_path('images/logoOficial.png');
            $cid = $mail->embed($logoPath);
            $mail->html("
                <div style='font-family:Arial,sans-serif;line-height:1.6;color:#333;text-align:justify;'>
                    <p>Olá,</p>
                    <p>Você recebeu uma nova mensagem pelo WorkUP de <strong>{$sender->name}</strong>:</p>
                    <div style='padding:10px;margin:15px 0;background:#f8f8f8;border-left:4px solid rgba(102, 51, 153, 0.72);text-align:justify;'>
                        " . nl2br(e($content)) . "
                    </div>
                    <p>Para responder, basta clicar em <strong>Responder</strong></p>
                    <p>Atenciosamente,<br>Equipe WorkUP</p>
                    <img src='{$cid}' alt='WorkUP Logo'>
                </div>
            ");
        });
    
        return redirect()->back()->with('success', 'E-mail enviado com sucesso!');
    }
    

}
