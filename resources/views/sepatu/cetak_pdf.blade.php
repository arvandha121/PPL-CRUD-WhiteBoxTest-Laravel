<!DOCTYPE html>
<html>

<head>
    <title>Kartu Hasil Studi</title>
</head>

<body>
    <center>
        <h2>KARTU Detail Sepatu</h2>
    </center>
    <table style="width:95%; margin:20px auto; border-style: solid;">
        <thead>
            <tr>
                <th style="border-style: solid;">Brand</th>
                <th style="border-style: solid;">Ukuran</th>
                <th style="border-style: solid;">Warna</th>
                <th style="border-style: solid;">Harga</th>
                <th style="border-style: solid;">Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sepatu as $spt)
            <tr>
                <td style="border-style: solid;">
                    {{$spt->brand}}
                </td>
                <td style="border-style: solid;">
                    {{$spt->ukuran}}
                </td>
                <td style="border-style: solid;">
                    {{$spt->warna}}
                </td>
                <td style="border-style: solid;">
                    {{$spt->harga}}
                </td>
                <td style="border-style: solid;">
                    <center>
                        <img width="50%" src="gambar/{{ $spt->gambar }}" alt="">
                    </center>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>