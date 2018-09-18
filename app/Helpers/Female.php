<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Female
{
    public static function getFemales()
    {

        $available = 0;

        $data = DB::table('reproducers as r')
            ->join('weanings as w', 'r.id', '=', 'w.reproducer_id')
            ->select('r.id', 'r.code', 'w.id as weaning', 'w.date', 'w.quantity')
            ->where('w.state', 'PENDING')
            ->get();
        $females = [];
        foreach ($data as $key => $value) {
            $suma    = 0;
            $weaning = DB::table('weanings as w')
                ->join('group_weaning as p', 'w.id', '=', 'p.weaning_id')
                ->join('groups as g', 'p.group_id', '=', 'g.id')
                ->select('p.females', 'p.males')
                ->where('w.id', $value->weaning)
                ->get();
            if ($weaning->count() > 0) {
                foreach ($weaning as $v) {
                    $suma += $v->females + $v->males;
                }
                $available = $value->quantity - $suma;
            } else {
                $available = $value->quantity;
            }
            $females[$key] = [
                'id'        => $value->id,
                'code'      => $value->code,
                'weaning'   => $value->weaning,
                'date'      => $value->date,
                'quantity'  => $value->quantity,
                'available' => $available,
            ];
        }
        return collect($females);
    }
}
