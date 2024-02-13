<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaction::with(['details.product'])->find($id);

        if ($product) return ResponseFormatter::success($product, 'Data transaksi berhasil diambil');

        return ResponseFormatter::error(null, 'Data transaksi tidak ada');
    }
}
