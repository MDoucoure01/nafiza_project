<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Mail\NotifMessage;
use App\Models\Messagerie;
use App\Models\Notification;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Mediumart\Orange\SMS\Http\SMSClient;
use Mediumart\Orange\SMS\SMS;

class MessagerieController extends Controller
{
    public function sendMessage(Request $request)
    {
        set_time_limit(300);

        $sessionId = $request->appActuSession->id;

        $message = new Messagerie();
        $message->user_id = Auth::id();
        $message->subject = $request->subject;
        $message->message = $request->contenu_message;
        $message->is_sms = $request->is_sms;
        $message->is_mail = $request->is_mail;
        $message->is_communique = $request->is_communique;
        $message->save();

        if($request->destinataires == "all_students"){
            $destinataires = Student::whereHas('subscriptions', function($query) use ($sessionId) {
                $query->where('school_session_id', $sessionId)
                    ->where('is_active', 1);
            })->with(['subscriptions' => function($query) {
                $query->whereHas('cohort', function($query) {
                    $query->where('is_actual', 1); // Récupérer la cohorte actuelle
                });
            }])->get();
        }
        else{
            $destinataires = Professor::all();
        }

        if ($request->is_communique) {
            foreach ($destinataires as $value) {
                $notif = new Notification();
                $notif->user_id = $value->user->id;
                $notif->messagerie_id = $message->id;
                $notif->save();
            }
        }

        if ($request->is_sms) {
            $client = SMSClient::getInstance(env('SMS_APIKEY'), env('SMS_APISECRET'));
            $sms = new SMS($client);

            //$numbers = ['776623520', '781151148', '776090929', '772795725'];

            foreach ($destinataires as $phone) {

                $phoneNumber = '+221' . $phone->user->phone;

                $response = $sms->to($phoneNumber)
                        ->from('+221776623520', env('APP_NAME'))
                        ->message($request->contenu_message)
                        ->send();
            }
        }

        if ($request->is_mail) {
            foreach ($destinataires as $value) {

                $validator = Validator::make(
                    ['email' => $value->user->email],
                    ['email' => 'required|email']
                );

                if (!$validator->fails()) {
                    // La validation est bonne
                    Mail::to($value->user->email)->send(new NotifMessage($request->contenu_message));
                }
            }
        }

        toastr()->success('Message envoyé avec succes.');
        return back();
    }

}
