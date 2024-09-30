<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use App\Models\Ticket;
use App\Models\Cart;
use App\Models\BankCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\TicketPurchase;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{

    public function myTicketPage()
    {
        $usersTickets = Auth::user()->getTickets;
        foreach($usersTickets as $key => $item)
        {
            $hybridRoute = json_decode($item->routes);
            foreach ($hybridRoute as $item)
            {
                $routes[$key][] = Segment::findOrFail($item);
            }
        }
        if (isset($routes))
        {
            return view('pages.myTickets', compact('routes'));
        }
        else
        {
            return view('pages.myTickets');
        }
    }

    public function buyTicketPage(Request $request)
    {
        $requestData = $request->all();
        $routes = [];
        $price = 0;

        foreach($requestData as $key => $value)
        {
            if ($key != '_token' && $value = 'selected')
            {
                $routes[] = Segment::findOrFail($key);
                $price += Segment::findOrFail($key)->price;
            }
        }

        if (count($routes) == 0)
        {
            return redirect()->back()->with('success_message', 'Маршруты не были выбраны');
        }

        return view('pages.buyTicket', compact('routes', 'price'));
    }

    public function transaction(Request $request)
    {
        $requestData = $request->all();
        // return intval($requestData['total_amount']);
        $user = Auth::user();
        $fullname = $user->surname . ' ' . $user->name . ' ' . $user->middle_name;
        $email = $user->email;
        $userId = $user->id;

        // return Auth::user()->getBankCard;
        $routes = [];

        if ($user->getIdCard != null && $user->getBankCard != null)
        {
            if (intval($user->getBankCard->money) >= intval($requestData['total_amount']))
            {
                $bankCard = BankCard::findOrFail($user->getBankCard->id);
                $bankCard->money = $user->getBankCard->money - intval($requestData['total_amount']);
                $bankCard->update();
                // $user->getBankCard->money
            }
            else
            {
                return redirect()->route('cart.page')->with('success_message', 'У вас недостаточно средств для покупки, попробуйте перевыбрать маршруты');
            }
        }
        else
        {
            return redirect()->route('tickets.profile')->with('success_message', 'Прикрепите удостоверение и банковскую карту к вашему аккаунту');
        }

        foreach ($requestData as $key => $value)
        {
            if ($key != '_token' && $key != 'quantity' && $key != 'total_amount')
            {
                $routes[] = $key;
            }
        };

        foreach ($routes as $item)
        {
            $cartRoute = Cart::where('route', $item)->where('user', $userId)->get();
            $route = Segment::findOrFail($item);
            $route->seats_number = intval($route->seats_number) - intval($requestData['quantity']);
            $route->update();
        }

        foreach ($cartRoute as $item)
        {
            $item->delete();
        }


        for($i = 0; $i < intval($requestData['quantity']); $i++)
        {
            $ticket = new Ticket();
            $ticket->passenger = $userId;
            $ticket->routes = json_encode($routes);
            $ticket->save();
        }

        $ticketData = [
            'fullname' => $fullname,
            'routes' => []
        ];

        foreach($routes as $item)
        {
            $ticketData['routes'][] = Segment::with('getOrganization')->findOrFail($item);
        }

        Mail::to($email)->send(new TicketPurchase($ticketData));
        return redirect()->route('tickets.my_tickets')->with('success_message', 'Вы удачно купили билет!');
    }
}
