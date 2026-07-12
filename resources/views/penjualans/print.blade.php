<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Penjualan #{{ $penjualan->id }}</title>
    <style>
        body { margin: 0; padding: 20px; background-color: #f3f4f6; }
        .receipt-container {
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            line-height: 1.2;
            width: fit-content;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        pre { margin: 0; font-family: inherit; }
        @media print {
            body { padding: 0; background: white; }
            .receipt-container { box-shadow: none; padding: 0; margin: 0; }
            .no-print { display: none; }
        }
        .btn-print {
            padding: 10px 20px;
            background-color: #f97316;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: sans-serif;
            font-weight: bold;
        }
        .btn-back {
            margin-left: 10px;
            color: #666;
            text-decoration: none;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 20px; text-align: center;">
        <button onclick="window.print()" class="btn-print">Cetak Nota</button>
        <a href="{{ route('penjualans.index') }}" class="btn-back">Kembali</a>
    </div>

    <div class="receipt-container">
<pre>
========================================
         PETERNAKAN ROHMAT AYAM
       Penjualan Telur Ayam Segar

Alamat : Bangun Rejo, Lampung Tengah
Telp/WA: 0858-3700-3928
========================================

No. Transaksi : TRX-{{ str_pad($penjualan->id, 5, '0', STR_PAD_LEFT) }}
Tanggal       : {{ \Carbon\Carbon::parse($penjualan->tanggal)->translatedFormat('d F Y') }}
Pelanggan     : {{ str_pad(substr($penjualan->pelanggan_id ? $penjualan->pelanggan->nama : ($penjualan->nama_pelanggan ?: 'Umum'), 0, 24), 24) }}
Kasir         : {{ str_pad(substr($penjualan->user->name ?? '-', 0, 24), 24) }}

----------------------------------------
Item               Qty   Harga  Subtotal
----------------------------------------
@php
    $qty_val = $penjualan->pelanggan_id ? number_format($penjualan->jumlah / 15, 0, ',', '.') : number_format($penjualan->jumlah, 2, ',', '.');
    $qty_unit = $penjualan->pelanggan_id ? 'Kotak' : 'Kg';
    $qty_str = $qty_val . ' ' . $qty_unit;
    $harga = $penjualan->pelanggan_id ? number_format($penjualan->harga_satuan * 15, 0, ',', '.') : number_format($penjualan->harga_satuan, 0, ',', '.');
    $subtotal = number_format($penjualan->total_harga, 0, ',', '.');
    
    $item = str_pad("Telur Ayam", 14);
    $qty_pad = str_pad($qty_str, 8, " ", STR_PAD_LEFT);
    $harga_pad = str_pad($harga, 8, " ", STR_PAD_LEFT);
    $sub_pad = str_pad($subtotal, 10, " ", STR_PAD_LEFT);
@endphp
{{ $item }}{{ $qty_pad }}{{ $harga_pad }}{{ $sub_pad }}
----------------------------------------
TOTAL                 Rp{{ str_pad(number_format($penjualan->total_harga, 0, ',', '.'), 12, " ", STR_PAD_LEFT) }}
========================================

   Terima kasih atas kepercayaan Anda
  Barang yang telah dibeli tidak dapat
       ditukar atau dikembalikan.

          Semoga sehat selalu.
========================================
   Hak Cipta © {{ date('Y') }} Peternakan Rohmat
</pre>
    </div>
    
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
