<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: sans-serif;
            font-size: 8px;
        }
        @page{
            size: 10cm 15cm ;
            margin: 10px;
        }

    </style>
</head>
<body>
    @php
        $subTotal = 0;
        $number = 1;
    @endphp
    <table style="width: 100%; margin-bottom:-3px;align-items:center">
        <tr>
            <th>
                <img src="{{public_path('assets/logos/logo_jember.png')}}" style="width: 1.7cm; height:1.8cm;" alt="">
            </th>
            <th>
                <div style="font-weight:normal">
                    <center><p>
                        <h1 style="font-weight:normal;margin-bottom:-1px">UPT SIM-KLINIK</h1>
                        <b style="text-transform:uppercase;letter-spacing: 2px;">Politeknik Negeri Jember</b>
                        <br>
                        Jl. Mastrip, Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121
                    </p></center>
                    <br><br>
                </div>
            </th>
            <th>
                <img src="{{public_path('assets/logos/logo_polije.png')}}" style="width: 1.9cm; height:1.9cm;" alt="">
            </th>
        </tr>
    </table>
    <hr style="background-color:black; border:none; height:2px;">
    <div>
        <p>Nama Pasien : {{$getDetailPatient->name}}</p>
        <p>Kode RM : {{$getDetailPatient->code_rm}}</p>
    </div>
    <div>
        <table class="table-auto mt-1" style="width:100%; padding-top: 1em; border-collapse: collapse; padding-bottom: 1em;">
            <tr>
                <td style="border: 1px solid #999;" colspan="5"><center><h3>Resep Obat</h3></center></td>
            </tr>
            <tr>
                <th style="border: 1px solid #999;">No</th>
                <th style="border: 1px solid #999;">Nama Obat</th>
                <th style="border: 1px solid #999;">Harga</th>
                <th style="border: 1px solid #999;">Jumlah</th>
                <th style="border: 1px solid #999;">Total</th>
            </tr>
            @foreach ($getDetailRecipe as $itemRecipe)
            @php
                $subTotal+=(int)$itemRecipe->total;
            @endphp
            <tr>
                <td style="border: 1px solid #999;"><center>{{$loop->iteration}}</center></td>
                <td style="border: 1px solid #999; padding-left: 5px;">{{$itemRecipe->medicine_name}}</td>
                <td style="border: 1px solid #999; padding-left: 5px;">@currency($itemRecipe->price)</td>
                <td style="border: 1px solid #999; padding-left: 5px;"><center>{{$itemRecipe->qty}}</center></td>
                <td style="border: 1px solid #999; padding-left: 5px;">@currency($itemRecipe->total)</td>
            </tr>
            @endforeach
            <tr>
                <td style="border: 1px solid #999;" colspan="4"><b><center>Sub Total</center></b></td>
                <td style="border: 1px solid #999; padding-left: 5px;" colspan="1"><b>@currency($subTotal)</b></td>
            </tr>
        </table>
    </div>
    {{-- <div>
        <table class="table-auto mt-1" style="width:100%; padding-top: 1em; border-collapse: collapse; padding-bottom: 1em; border: 1px solid #999;">
            <tr>
                <td rowspan="2" style="text-align: center; border-right: 1px solid #999; width: 50%;"><b>TTD Pasien / Keluarga</b></td>
                <td style="text-align: center;"><b>Jember, {{ \Carbon\Carbon::parse($getDetailPayment->date_payment)->format('d F Y') }}</b></td>
            </tr>
            <tr>
                <td style="text-align: center;"><b>Dokter Penanggung Jawab</b></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid #999; width: 50%;">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid #999; width: 50%;">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid #999; width: 50%;">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid #999; width: 50%;">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center; border-right: 1px solid #999; width: 50%;">( {{$getDetailPatient->name}} )</td>
                <td style="text-align: center;">( {{$getDoctor->name}} )</td>
            </tr>
            <tr>
                <td style="text-align: center; border-right: 1px solid #999; width: 50%;">Nama Terang</td>
                <td style="text-align: center;">Nama Terang</td>
            </tr>
        </table>
    </div> --}}
</body>
</html>
