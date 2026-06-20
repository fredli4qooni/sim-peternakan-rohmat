<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Penjualan #{{ $penjualan->id }}</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; color: #333; }
        .nota-container { border: 1px dashed #ccc; padding: 20px; width: 400px; max-width: 100%; margin: 0 auto; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 8px 0; border-bottom: 1px dashed #eee; }
        .total-row td { border-bottom: none; border-top: 1px solid #333; font-weight: bold; font-size: 1.1em; }
        .header h1 { margin: 0; font-size: 24px; color: #f97316; } /* Orange-500 equivalent */
        .header p { margin: 5px 0; font-size: 14px; color: #666; }
        .divider { border-bottom: 2px dashed #ccc; margin: 15px 0; }
        .info-table td { border-bottom: none; padding: 3px 0; font-size: 14px; }
        @media print {
            @page { margin: 10px; }
            body { padding: 0; }
            .nota-container { border: none; width: 100%; max-width: 100%; padding: 10px; margin: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="no-print" style="margin-bottom: 20px; text-align: center;">
        <button onclick="window.print()" style="padding: 10px 20px; background-color: #f97316; color: white; border: none; border-radius: 5px; cursor: pointer;">Cetak Nota</button>
        <a href="{{ route('penjualans.index') }}" style="margin-left: 10px; color: #666; text-decoration: none;">Kembali</a>
    </div>

    <div class="nota-container">
        <div class="header text-center">
            <h1>SIM TELUR</h1>
            <p>Sistem Informasi Manajemen Telur</p>
            <p>Telp: 0812-3456-7890</p>
        </div>
        
        <div class="divider"></div>

        <table class="info-table">
            <tr>
                <td>No. Transaksi</td>
                <td>: #TRX-{{ str_pad($penjualan->id, 5, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{ \Carbon\Carbon::parse($penjualan->tanggal)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td>Pelanggan</td>
                <td>: {{ $penjualan->pelanggan_id ? $penjualan->pelanggan->nama . ' (Agen)' : ($penjualan->nama_pelanggan ?: 'Umum/Eceran') }}</td>
            </tr>
            <tr>
                <td>Kasir</td>
                <td>: {{ $penjualan->user->name ?? '-' }}</td>
            </tr>
        </table>

        <div class="divider"></div>

        <table>
            <thead>
                <tr>
                    <th style="text-align: left;">Item</th>
                    <th class="text-right">Qty (Kg)</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Telur Ayam</td>
                    <td class="text-right">{{ number_format($penjualan->jumlah, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($penjualan->harga_satuan, 0, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3" class="text-right" style="padding-right: 15px;">TOTAL</td>
                    <td class="text-right">Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="divider"></div>

        <div class="text-center" style="font-size: 13px; color: #666; margin-top: 20px;">
            <p>Terima kasih atas pembelian Anda!</p>
            <p>Barang yang sudah dibeli tidak dapat ditukar/dikembalikan.</p>
        </div>
    </div>
</body>
</html>
