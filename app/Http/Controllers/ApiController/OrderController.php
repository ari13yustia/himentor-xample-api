<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET MINGGU LALU
        $now = Carbon::now()->format('l');
        $lastMonday = Carbon::now()->previous($now);
        $weekStartDate = $lastMonday->startOfWeek(Carbon::SATURDAY)->format('Y-m-d H:i');
        $weekEndDate = $lastMonday->endOfWeek(Carbon::FRIDAY)->format('Y-m-d H:i');

        //GET DATA PER MINGGU
        $dataM = OrderModel::select([
            '*',
            DB::raw('DATE(created_at) as date'),
            DB::raw('sum(price) as total')

        ])->where('mentor_id',1)->whereBetween( 'created_at', [$weekStartDate,$weekEndDate])->groupBy('date')->get();

        $dataMinggu = [];
        for($i=0; $i < 7; $i++){
            $addDay = date('Y-m-d', strtotime($weekStartDate. ' + '.$i.' day'));
            foreach($dataM as $row) {
                $dateDatabase = date('Y-m-d', strtotime($row->created_at));
                if($dateDatabase == $addDay) {
                    $accountID = $row->account_id;
                    $mentorID = $row->mentor_id;
                    $tanggal = $dateDatabase;
                    $total = $row->total;
                    break;
                }else{
                    $accountID = $row->account_id;
                    $mentorID = $row->mentor_id;
                    $tanggal = $addDay;
                    $total = 0;
                }
            }
            $dataMinggu[] = [
                'account_id' => $accountID,
                'mentor_id' => $mentorID,
                'date' => $tanggal,
                'total' => $total
            ];
        }

        //GET DATA PER HARI
        $dataH = OrderModel::select([
            '*',
            DB::raw('DATE(created_at) as date'),
            DB::raw('sum(price) as total')

        ])->where('mentor_id',1)->whereDate('created_at', Carbon::now())->groupBy('date')->get();

        return response([
            'dataHari' => $dataH,
            'dataMinggu' => $dataMinggu
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'price' => 'required|numeric',
            'account_id' => 'required',
            'mentor_id' => 'required'
        ]);
        $data = new OrderModel();
        $data->price = $field['price'];
        $data->account_id = $field['account_id'];
        $data->mentor_id = $field['mentor_id'];
        $data->save();

        if($data) {
            $message = 'Data berhasil disimpan';
        }else{
            $message = 'Data gagal disimpan';
        }

        return response([
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = OrderModel::find($id);
        if($data) {
            $message = 'berhasil';
        }else{
            $message = 'gagal';
        }

        return response([
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $field = $request->validate([
            'price' => 'required|numeric',
            'account_id' => 'required',
            'mentor_id' => 'required'
        ]);
        $data = OrderModel::find($id);
        $data->price = $field['price'];
        $data->account_id = $field['account_id'];
        $data->mentor_id = $field['mentor_id'];
        $data->save();

        if($data) {
            $message = 'Data berhasil disimpan';
        }else{
            $message = 'Data gagal disimpan';
        }

        return response([
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = OrderModel::find($id);
        if($data){
            $data->delete();
            $message = "Data Berhasil di hapus";
        }else{
            $message = "Data gagal dihapus";
        }

        return response([
            'message' => $message
        ]);
    }
}
