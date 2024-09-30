<?php

namespace App\Http\Controllers;

use App\Models\BankCard;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IdCard;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function idCardPage ()
    {
        $userData = Auth::user();
        $idCardData = $userData->getIdCard;
        return view('pages.idCard', compact('idCardData'));
    }

    public function bankCardPage ()
    {
        $userData = Auth::user();
        $bankCardData = $userData->getBankCard;
        return view('pages.bankCard', compact('bankCardData'));
    }

    public function updateProfile ( Request $request)
    {
        $requestData = $request->all();
        $userId = Auth::user()->id;
        $userData = User::findOrFail($userId);
        $userData->name = $requestData['name'];
        $userData->surname = $requestData['surname'];
        $userData->middle_name = $requestData['middle_name'];
        $userData->email = $requestData['email'];
        $userData->birth_date = $requestData['birth_date'];
        $userData->update();

        return redirect()->back()->with('success_message', 'Данные вашего аккаунта профиля успешно обновлен');
    }

    public function idCardDataUpdate (Request $request)
    {
        $requestData = $request->all();
        // return $requestData;
        $idCard = Auth::user()->id_card;
        if ($idCard == null)
        {
            $idCard = new IdCard();
            $idCard->name = $requestData['name'];
            $idCard->surname = $requestData['surname'];
            $idCard->middle_name = $requestData['middle_name'];
            $idCard->birth_date = $requestData['birth_date'];
            $idCard->iin = $requestData['iin'];
            $idCard->number = $requestData['number'];
            $idCard->nationality = $requestData['nationality'];
            $idCard->save();
            $idCardId = $idCard->id;
            $userId = Auth::user()->id;
            $userData = User::findOrFail($userId);
            $userData->id_card = $idCardId;
            $userData->update();
        }
        else
        {
            $idCardData = IdCard::findOrFail($idCard);
            $idCardData->name = $requestData['name'];
            $idCardData->surname = $requestData['surname'];
            $idCardData->middle_name = $requestData['middle_name'];
            $idCardData->birth_date = $requestData['birth_date'];
            $idCardData->iin = $requestData['iin'];
            $idCardData->number = $requestData['number'];
            $idCardData->nationality = $requestData['nationality'];
            $idCardData->update();
        }
        return redirect()->back()->with('success_message', 'Данные вашего удостоверения личности успешно обновлен');
    }

    public function bankCardDataUpdate (Request $request)
    {
        $requestData = $request->all();
        // return $requestData;
        $bankCard = Auth::user()->bank_card;
        if ($bankCard == null)
        {
            $bankCard = new BankCard();
            $bankCard->name = $requestData['name'];
            $bankCard->number = $requestData['number'];
            $bankCard->cvv = $requestData['cvv'];
            $bankCard->save();
            $bankCardId = $bankCard->id;
            $userId = Auth::user()->id;
            $userData = User::findOrFail($userId);
            $userData->bank_card = $bankCardId;
            $userData->update();
        }
        else
        {
            $bankCard = BankCard::findOrFail($bankCard);
            $bankCard->name = $requestData['name'];
            $bankCard->number = $requestData['number'];
            $bankCard->cvv = $requestData['cvv'];
            $bankCard->update();
        }
        return redirect()->back()->with('success_message', 'Данные вашей банковской карты успешно обновлен');
    }
}
