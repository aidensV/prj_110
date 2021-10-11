<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        td{
            margin: 2px;
            border: 1px solid black;
        }
        th{
            background-color: rgb(71, 177, 71);
            border: 1px solid black;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            }
    </style>
    <div style="background-color: orange;text-align:center">
        AUDIT MUTU INTERNAL<br>
        PROGRAM {{$user->name}}
    </div>
    <br>
    <div style="background-color: rgb(136, 136, 235);color:white;">
        PETUNJUK PENGISIAN: SEL YANG DIISI HANYA YANG BERWARNA KUNING
    </div>
    <br>
    <table>
        <tr>
            <th style="font-size: 10px;">NO</th>
            <th style="font-size: 10px;">NO</th>
            <th style="font-size: 10px;">ELEMEN</th>
            <th style="font-size: 10px;">INDIKATOR DAN PENILAIAN</th>
            <th style="font-size: 10px;">SKOR TPMP</th>
            <th style="font-size: 10px;">SKOR AUDITOR</th>
            <th style="font-size: 10px;">Ket</th>
            <th style="font-size: 10px;">STANDAR UNILA</th>
            <th style="font-size: 10px;">BOBOT SUMBER</th>
            <th style="font-size: 10px;">BOBOT AMI</th>
            <th style="font-size: 10px;">CAPAIAN</th>
            <th style="font-size: 10px;">PERSEN KINERJA</th>
            <th style="font-size: 10px;">CATATAN</th>
        </tr>
        @foreach ($m_borang as $key => $item)
    <tr>
        <td style="font-size: 10px">{{$key+1}}</td>
        <td style="font-size: 10px">{{$item->no_stndr}}</td>
        <td style="font-size: 10px">{{$item->elemen}}</td>
        <td style="font-size: 10px">
            @foreach ($item->indikator as $indikator)
            {{$indikator->value_indicator}}<hr style="height:1px;border-width:0;color:rgb(255, 255, 255);background-color:rgb(255, 255, 255)">
            @endforeach
            </td>
        <td style="font-size: 10px">{{$item->skor_PS}}</td>
        <td style="font-size: 10px">{{$item->skor_auditor}}</td>
        <td style="font-size: 10px">{{$item->ket}}</td>
        <td style="font-size: 10px">{{$item->stnd_unila}}</td>
        <td style="font-size: 10px">{{$item->bobot_sumber}}</td>
        <td style="font-size: 10px">{{$item->bobot_ami}}</td>
        <td style="font-size: 10px">{{$item->capaian}}</td>
        <td style="font-size: 10px">{{$item->kinerja}}</td>
        <td style="font-size: 10px">{{$item->catatan}}</td>
    </tr>
    @endforeach
    </table>
    
    
</body>
</html>