<?php

namespace App\Http\Controllers;

use App\WOE_Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WOEController extends Controller
{
    public function index()
    {
        $woe = WOE_Data::orderby('castle_id','asc')->paginate(20);
        return view('ucp.gm_woe_index')->with('woe', $woe);
    }

    public function create()
    {
        return view('ucp.gm_woe_create');
    }

    public function edit(WOE_Data $woe)
    {
        return view('ucp.gm_woe_edit')->with('woe', $woe);
    }

    public function show(WOE_Data $woe)
    {
        return view('ucp.gm_woe_view')->with('woe', $woe);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');

        $validator = Validator::make($request->all(), [
            'castle_id' => ['required', 'integer', 'min:0'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $woe = WOE_Data::create($data);
        if(!$woe){
            return redirect()->back()->withErrors(['error'=>'เพิ่มข้อมูล WOE Castle ล้มเหลว! กรุณาติดต่อผู้ดูแลระบบ']);
        }
        return redirect()->route('manage.woe.index')->withErrors(['success'=>'เพิ่มข้อมูล WOE Castle ID:'.$woe->id.' สำเร็จ!']);
    }

    public function update(Request $request, WOE_Data $woe)
    {
        $data = $request->except('_token', '_method');

        $validator = Validator::make($request->all(), [
            'castle_id' => ['required', 'integer', 'min:0'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        if(!($woe->update($data))){
            return redirect()->back()->withErrors(['error'=>'แก้ไขข้อมูล WOE Castle ID:'.$woe->id.' ล้มเหลว! กรุณาติดต่อผู้ดูแลระบบ']);
        }
        return redirect()->route('manage.woe.show', $woe->id)->withErrors(['success'=>'แก้ไขข้อมูล WOE Castle ID:'.$woe->id.' สำเร็จ!']);
    }

    public function destroy(WOE_Data $woe)
    {
        $result = $woe->delete();

        if(!$result){
            return redirect()->route('manage.woe.index')->withErrors(['error'=>'ลบข้อมูลล้มเหลว!']);
        }
        return redirect()->route('manage.woe.index')->withErrors(['error'=>'ลบข้อมูลสำเร็จ!']);
    }

    public function truncate()
    {
        $result = WOE_Data::truncate();
        if(!$result){
            return redirect()->route('manage.woe.index')->withErrors(['error'=>'รีเซ็ตข้อมูลล้มเหลว!']);
        }

        //WOE Castle Default
        $data = [
            //WOE FE Castle
            [
                'castle_id'=> 0,
                'name' => 'Neuschwanstein',
            ],
            [
                'castle_id'=> 1,
                'name' => 'Hohenschwangau',
            ],
            [
                'castle_id'=> 2,
                'name' => 'Nuernberg',
            ],
            [
                'castle_id'=> 3,
                'name' => 'Wuerzburg',
            ],
            [
                'castle_id'=> 4,
                'name' => 'Rothenburg',
            ],
            [
                'castle_id'=> 5,
                'name' => 'Repherion',
            ],
            [
                'castle_id'=> 6,
                'name' => 'Eeyolbriggar',
            ],
            [
                'castle_id'=> 7,
                'name' => 'Yesnelph',
            ],
            [
                'castle_id'=> 8,
                'name' => 'Bergel',
            ],
            [
                'castle_id'=> 9,
                'name' => 'Mersetzdeitz',
            ],
            [
                'castle_id'=> 10,
                'name' => 'Bright Arbor',
            ],
            [
                'castle_id'=> 11,
                'name' => 'Scarlet Palace',
            ],
            [
                'castle_id'=> 12,
                'name' => 'Holy Shadow',
            ],
            [
                'castle_id'=> 13,
                'name' => 'Sacred Altar',
            ],
            [
                'castle_id'=> 14,
                'name' => 'Bamboo Grove Hill',
            ],
            [
                'castle_id'=> 15,
                'name' => 'Kriemhild',
            ],
            [
                'castle_id'=> 16,
                'name' => 'Swanhild',
            ],
            [
                'castle_id'=> 17,
                'name' => 'Fadhgridh',
            ],
            [
                'castle_id'=> 18,
                'name' => 'Skoegul',
            ],
            [
                'castle_id'=> 19,
                'name' => 'Gondul',
            ],

            //WOE NGuild Castle
            [
                'castle_id'=> 20,
                'name' => 'Earth',
            ],
            [
                'castle_id'=> 21,
                'name' => 'Air',
            ],
            [
                'castle_id'=> 22,
                'name' => 'Water',
            ],
            [
                'castle_id'=> 23,
                'name' => 'Fire',
            ],

            //WOE SE Castle
            [
                'castle_id'=> 24,
                'name' => 'Himinn',
            ],
            [
                'castle_id'=> 25,
                'name' => 'Andlangr',
            ],
            [
                'castle_id'=> 26,
                'name' => 'Viblainn',
            ],
            [
                'castle_id'=> 27,
                'name' => 'Hljod',
            ],
            [
                'castle_id'=> 28,
                'name' => 'Skidbladnir',
            ],
            [
                'castle_id'=> 29,
                'name' => 'Mardol',
            ],
            [
                'castle_id'=> 30,
                'name' => 'Cyr',
            ],
            [
                'castle_id'=> 31,
                'name' => 'Horn',
            ],
            [
                'castle_id'=> 32,
                'name' => 'Gefn',
            ],
            [
                'castle_id'=> 33,
                'name' => 'Bandis',
            ],

            //WOE TE Castle
            [
                'castle_id'=> 34,
                'name' => 'Kafragarten 1',
            ],
            [
                'castle_id'=> 35,
                'name' => 'Kafragarten 2',
            ],
            [
                'castle_id'=> 36,
                'name' => 'Kafragarten 3',
            ],
            [
                'castle_id'=> 37,
                'name' => 'Kafragarten 4',
            ],
            [
                'castle_id'=> 38,
                'name' => 'Kafragarten 5',
            ],
            [
                'castle_id'=> 39,
                'name' => 'Gloria 1',
            ],
            [
                'castle_id'=> 40,
                'name' => 'Gloria 2',
            ],
            [
                'castle_id'=> 41,
                'name' => 'Gloria 3',
            ],
            [
                'castle_id'=> 42,
                'name' => 'Gloria 4',
            ],
            [
                'castle_id'=> 43,
                'name' => 'Gloria 5',
            ],
        ];

        WOE_Data::insert($data);

        return redirect()->route('manage.woe.index')->withErrors(['error'=>'รีเซ็ตข้อมูลสำเร็จ!']);
    }
}
