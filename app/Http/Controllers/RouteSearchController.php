<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segment;

class RouteSearchController extends Controller
{
    public function getDataFromForm(Request $request)
    {
        $requestData = $request->all();
        $routes = Segment::query()->with(['getOrganization'])->get();
        $relevantRoutes = [];
        // return $routes;
        foreach ($routes as $item)
        {
            // return $requestData;
            if (isset($requestData['from_place'])){
                if (mb_strtolower($item->from_place) != mb_strtolower($requestData['from_place']))
                {
                    continue;
                }
            }
            if (isset($requestData['to_place'])){
                if (mb_strtolower($item->to_place) != mb_strtolower($requestData['to_place']))
                {
                    continue;
                }
            }

            if (isset($requestData['departure_time']))
            {
                $routeDepartureDate = explode(' ', $item->departure_time)[0];
                if ($requestData['departure_time'] == $routeDepartureDate)
                {
                    if (isset($requestData['arrival_time']))
                    {
                        $routeArrivalDate = explode(' ', $item->arrival_time)[0];
                        if ($requestData['arrival_time'] == $routeArrivalDate)
                        {
                            $relevantRoutes[] = $item;
                        }
                        else
                        {
                            continue;
                        }
                    }
                    else
                    {
                        $relevantRoutes[] = $item;
                    }
                }
                else
                {
                    continue;
                }
            }
            else
            {
                if (isset($requestData['arrival_time']))
                    {
                        $routeArrivalDate = explode(' ', $item->arrival_time)[0];
                        if ($requestData['arrival_time'] == $routeArrivalDate)
                        {
                            $relevantRoutes[] = $item;
                        }
                        else
                        {
                            continue;
                        }
                    }
                    else
                    {
                        $relevantRoutes[] = $item;
                    }
            }
        }
        // return count($relevantRoutes);
        $segmentsDateTime = Segment::pluck('departure_time')->toArray();
        $segmentsDate = [];
        foreach($segmentsDateTime as $item)
        {
            $segmentsDate[] = explode(' ', $item)[0];
        }
        return view('pages.searchResults', compact('relevantRoutes', 'segmentsDate'));
    }
}
