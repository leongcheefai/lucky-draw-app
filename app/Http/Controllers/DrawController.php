<?php

namespace App\Http\Controllers;

use App\Member;
use App\WinningTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrawController extends Controller
{
    protected $winning_numbers, $member;

    public function __construct(WinningTicket $wt, Member $member)
    {
        $this->winning_numbers = $wt;
        $this->member = $member;
    }

    public function draw(Request $request)
    {
        $grandPrize = [];
        $secondPrize = [];
        $thirdPrize = [];
        $idToExclude = [];
        $grandPrizeArr = [];
        $secPrizeSelection = ['3', '4'];
        $result = true;
        $isRandom = true;

        $validated = $request->validate([
            'type' => 'required_if:drawing_method,manual',
        ]);

        if ($request->drawing_method === 'random') {
            $grandPrize = $this->drawGrandPrize($isRandom);
            $idToExclude[] = $grandPrize->member->id;
            $secondPrize = $this->member::inRandomOrder()->whereNotIn('id', $idToExclude)->take(2)->get();
            foreach ($secondPrize as $item) {
                array_push($idToExclude, $item->id);
            }
            $thirdPrize = $this->member::inRandomOrder()->whereNotIn('id', $idToExclude)->take(3)->get();
        } else {
            if ($request->type === '5') { // first prize
                if (!$request->random) {
                    $isRandom = false;
                }
                $grandPrize = $this->drawGrandPrize($isRandom);
            } else if (in_array($request->type, $secPrizeSelection)) { // second prize
                if (!$request->random) {
                    $secondPrize = $this->member::whereHas('winningTickets', function ($query) use ($request) {
                        $query->whereValue($request->winning_number);
                    })->get();
                } else {
                    $secondPrize = $this->member::inRandomOrder()->get();
                }
            } else {
                if (!$request->random) {
                    $thirdPrize = $this->member::whereHas('winningTickets', function ($query) use ($request) {
                        $query->whereValue($request->winning_number);
                    })->get();
                } else {
                    $thirdPrize = $this->member::inRandomOrder()->get();
                }
            }
        }
        return view('result', compact('grandPrize', 'secondPrize', 'thirdPrize'));
    }

    public function drawGrandPrize($random = true)
    {
        $grandPrizeCandidate = $this->member::withCount('winningTickets')->orderBy('winning_tickets_count', 'desc')->get();
        $maxCount = $grandPrizeCandidate->max('winning_tickets_count');

        $grandPrize = $this->winning_numbers::select(['member_id', DB::raw('COUNT(1) as most_tickets')])->groupBy('member_id')->having('most_tickets', $maxCount)->with('member');

        if ($random) {
            $grandPrize = $grandPrize->inRandomOrder();
        }

        $grandPrize = $grandPrize->first();

        return $grandPrize;
    }
}
