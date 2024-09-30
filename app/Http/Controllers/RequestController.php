<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    private $webhook = 'https://b24-vjby86.bitrix24.kz/rest/1/fpugfdfdjyawmx8t/';

    private function bitrixDealCreate($contactId)
    {
        $webhookUrl = $this->webhook . 'crm.deal.add';

        // Данные сделки
        $dealData = [
            'fields' => [
                'TITLE' => 'Консультация',
                'STAGE_ID' => 'NEW',   // Валюта сделки, например 'USD'
                'CONTACT_ID' => $contactId, // ID контакта, связанного со сделкой
                // 'COMPANY_ID' => 1, // ID компании, связанной со сделкой
            ]
        ];

        $ch = curl_init();

        // Настройка cURL
        curl_setopt($ch, CURLOPT_URL, $webhookUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dealData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // Выполнение запроса и получение ответа
        $response = curl_exec($ch);

        // Проверка на ошибки
        if (curl_errno($ch)) {
            return 'Ошибка cURL: ' . curl_error($ch);
        } else {
            // Распечатка ответа
            return json_decode($response, 1);
        }

        // Закрытие cURL
        curl_close($ch);
    }

    private function bitrixContactCreate($request)
    {
        $webhookUrl = $this->webhook . 'crm.contact.add';

        // Данные сделки
        $contactData = [
            'fields' => [
                'NAME' => $request['name'],
                'PHONE' => [
                    [
                        'VALUE' => $request['phone'],
                        'VALUE_TYPE' => 'WORK'
                    ]
                ],
                'HAS_PHONE' => 'Y'
            ]
        ];
        // return $contactData;
        $ch = curl_init();

        // Настройка cURL
        curl_setopt($ch, CURLOPT_URL, $webhookUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contactData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // Выполнение запроса и получение ответа
        $response = curl_exec($ch);

        // Проверка на ошибки
        if (curl_errno($ch)) {
            curl_close($ch);
            return 'Ошибка cURL: ' . curl_error($ch);
        } else {
            curl_close($ch);
            // Распечатка ответа
            return  json_decode($response, 1);
        }
    }

    public function toBitrix(Request $request)
    {
        $requestData = $request->all();
        $contactCreateResult = $this->bitrixContactCreate($requestData);
        $contactId = $contactCreateResult['result'];
        $dealCreateResult = $this->bitrixDealCreate($contactId);
        return redirect()->back()->with('success_message', 'Ваша заявка успешно отправлено, пожалуйста подождите. С вами свяжуться в ближайшее время.');
    }
}
