<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .container {
            width: 300px;
            border: 2px dashed black;
            padding: 20px;
            margin: auto;
        }
        h2, p {
            margin: 5px 0;
        }
        .clinic-name {
            font-size: 18px;
            font-weight: bold;
        }
        .separator {
            border-top: 2px dashed black;
            margin: 10px 0;
        }
        .queue-number {
            font-size: 50px;
            font-weight: bold;
            margin: 10px 0;
        }
        .footer {
            font-size: 12px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="clinic-name"> Puskesmas Delanggu </p>
        <div class="separator"></div>
        <p><strong>Poli:</strong> {{ $antrian->poli }}</p>
        <p><strong>Sesi:</strong> {{ $antrian->sesi }}</p>
        <div class="separator"></div>
        <p>No. Antrian Anda:</p>
        <p class="queue-number">{{ $antrian->no_antrian }}</p>
        <div class="separator"></div>
        <p><strong>Nama:</strong> {{ $antrian->user->name }}</p>
        <div class="footer">
            <p>Harap datang tepat waktu sesuai jadwal.</p>
            <p>Terima kasih telah menggunakan layanan kami.</p>
        </div>
    </div>
</body>
</html>
