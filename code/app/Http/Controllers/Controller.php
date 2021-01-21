<?php

namespace App\Http\Controllers;

use App\Helpers\Man;
use App\Http\Requests\Q3PostRequest;
use App\Models\Course;
use DB;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function Q1page()
    {
        $countries = DB::table('countries')
            ->select(
                'code',
                DB::raw('AVG(govt_debt / gdp_per_capita) as debt'),
                DB::raw('COUNT(DISTINCT year) as years')
            )
            ->whereRaw('year >= YEAR(NOW()-interval 5 year)')
            ->where('gdp_per_capita', '>', 40000)
            ->groupBy('code')
            ->having('years', '=', 4)
            ->orderBy('debt', 'desc')
            ->limit(3)->get();

        $data = [
            'countries' => $countries,
        ];

        return view('q1', $data);
    }

    public function Q2page()
    {
        $man        = new Man('John Smith');
        $doctor     = new Man('Dr. Patel', true);
        $anotherMan = new Man('Another person');
        $actions    = [];
        $actions[]  = $this->_code('$man = new Man(\'John Smith\');<br />$doctor = new Man(\'Dr. Patel\', true);<br />$anotherMan = new Man(\'Another person\');');
        $actions[]  = $this->_notation($man->name . ' is being asked to open his mouth by ' . $doctor->name);
        $actions[]  = $this->_code('$man->askedTo($doctor, \'open\');');
        $actions[]  = $this->_action($man->askedTo($doctor, 'open'));
        $actions[]  = $this->_notation($doctor->name . ' is asking ' . $man->name . ' to close his mouth.');
        $actions[]  = $this->_code('$doctor->askingTo($man, \'close\');');
        $actions[]  = $this->_action($doctor->askingTo($man, 'close'));
        $actions[]  = $this->_notation($man->name . ' is being asked to open his mouth by ' . $anotherMan->name);
        $actions[]  = $this->_code('$man->askedTo($anotherMan, \'open\');');
        $actions[]  = $this->_action($man->askedTo($anotherMan, 'close'));
        $actions[]  = $this->_notation($anotherMan->name . ' is asking ' . $man->name . ' to close his mouth.');
        $actions[]  = $this->_code('$anotherMan->askingTo($man, \'close\');');
        $actions[]  = $this->_action($anotherMan->askingTo($man, 'close'));

        $data = [
            'html' => implode('', $actions),
        ];

        return view('q2', $data);
    }

    public function Q3page()
    {
        // $pages = Page::get();

        // dd($this->getReviewers('grammatic'));

        $data = [
            'pages' => [],
        ];

        return view('q3', $data);
    }

    public function Q3post(Q3PostRequest $request)
    {
        $choices = collect(json_decode($request->input('choices')))->reject(function ($value, $key) {
            return empty($value);
        })->map(function ($value, $key) {
            return ucfirst(strtolower($value));
        });

        foreach ($choices as $title) {
            Course::create([
                'title' => $title,
            ]);
        }

        $msg = 'The following courses have been saved: ' . $choices->join(', ');

        return response()->json(['msg' => $msg], 200);
    }

    public function showCode($line = '')
    {
        $url = $line ? 'https://github.com/jaygaura/maura/blob/master/code/app/Http/Controllers/Controller.php#L' . $line : 'https://github.com/jaygaura/maura/blob/master/code/app/Http/Controllers/Controller.php';
        return redirect()->away($url);
    }

    private function _code($code)
    {
        return sprintf('<p class="rounded-lg px-8 py-4 bg-orange-200 border border-orange-400 text-base">%s</p>', $code);
    }

    private function _action($action)
    {
        return sprintf('<p class="rounded-lg px-8 py-4 bg-green-200 border border-green-400 text-lg">%s</p>', $action);
    }

    private function _notation($notation)
    {
        return sprintf('<p class="text-lg font-semibold">%s</p>', $notation);
    }
}
