<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContributorController\PaymentRequest;
use App\Models\Certificate;
use App\Models\Contributor;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ContributorController extends Controller
{
    public function index()
    {
        $contributors = Contributor::orderBy('created_at', 'DESC')->get();
        return view('contributors', compact('contributors'));
    }

    public function sort($field)
    {
        $contributors = Contributor::withSort($field)->get();
        return view('ajax.contributors', compact('contributors'));
    }

    public function search($query)
    {
        $contributors = Contributor::withFilterFio($query)->get();
        return view('ajax.contributors', compact('contributors'));
    }

    public function searchCity($query)
    {
        $contributors = Contributor::withFilterCity($query)->get();
        return view('ajax.contributors', compact('contributors'));
    }

    public function payment(PaymentRequest $request)
    {
        $data = $request->validated();
        session()->push('req', $data);
        session()->save();

        //payment
        $lastId = 'Сертификат: ' . Certificate::latest()->first()->id + 1 . '|' . uniqid();
        $sber = array();
        $sber['userName'] = env('SBER_USERNAME');
        $sber['password'] = env('SBER_PWD');
        $sber['orderNumber'] = $lastId;// Order number
        $sber['amount'] = $request->sum*100;// Amount
        $sber['returnUrl'] = env('APP_URL').'/payment/success'; // Success redirect
        $sber['failUrl'] = env('APP_URL')."/contributors/payment/fail";// Failure redirect
        //$ch = curl_init('https://3dsec.sberbank.ru/payment/rest/register.do?' . http_build_query($sber));
        $ch = curl_init('https://securepayments.sberbank.ru/payment/rest/register.do?' . http_build_query($sber));
        //$ch = curl_init('https://securepayments.sberbank.ru/payment/rest/register.do?' . http_build_query($sber));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, JSON_OBJECT_AS_ARRAY);

        if (empty($response['orderId'])){
            echo $response['errorMessage'];
        } else {
            return redirect($response['formUrl']);
        }
    }

    public function paymentSuccess()
    {
        $session_data = session()->get('req');
        $req = end($session_data);
        $email = $req['email'];
        unset($req['email']);
        
        $contributor = Contributor::create($req);
        $certificate = Certificate::make($contributor->id);
        //Создаем юзера
        $password = User::generatePassword();
        $req['password'] = hash::make($password);
        $req['contributor_id'] = $contributor->id;
        $req['email'] = $email;
        $user = User::create($req);
        //Отправляем письмо
        $to      = $user->email;
        $subject = 'Доступы к личному кабинету - Verity';
        $message = "Email: {$user->email}";
        $message .= "\nПароль: {$password}";
        $mail = mail($to, $subject, $message);

        //Статистика
        if($req['recommender_id'] != null) {
            User::findOrFail($req['recommender_id'])->addStat('donated');
        }
        return to_route('certificate.show', $certificate->id);
    }

    public function paymentFail()
    {
        return 'Ошибка оплаты';
    }

    public function donate()
    {
        $countries = Country::get();
        $recommends = User::where('is_admin', false)->get();
        return view('donate', compact('countries', 'recommends'));
    }
}
