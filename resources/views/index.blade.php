<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Order</title>
</head>
<body>
    <h1>Data Order Mentor ID 1</h1>
    <p href="">== Perhari ==</p>
    <table border="1">
        <thead>
            <tr>
                <td style="padding: 1%; width:30%">Price</td>
                <td style="padding: 1%; width:20%">Account ID</td>
                <td style="padding: 1%; width:20%">Mentor ID</td>
                <td style="padding: 1%; width:20%">Created At</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 1%">{{$dataHari[0]['total']}}</td>
                <td style="padding: 1%">{{$dataHari[0]['account_id']}}</td>
                <td style="padding: 1%">{{$dataHari[0]['mentor_id']}}</td>
                <td style="padding: 1%">{{$dataHari[0]['date']}}</td>
            </tr>
        </tbody>
    </table>


    <p href=""> == Per Minggu ==</p>
    <table border="1">
        <thead>
            <tr>
                <td style="padding: 1%; width:30%">Price</td>
                <td style="padding: 1%; width:20%">Account ID</td>
                <td style="padding: 1%; width:20%">Mentor ID</td>
                <td style="padding: 1%; width:20%">Created At</td>
            </tr>
        </thead>
        @for ($i=0; $i < count($dataMinggu); $i++)
        <tbody>
            <tr >
                <td style="padding: 1%">{{$dataMinggu[$i]['total']}}</td>
                <td style="padding: 1%">{{$dataMinggu[$i]['account_id']}}</td>
                <td style="padding: 1%">{{$dataMinggu[$i]['mentor_id']}}</td>
                <td style="padding: 1%">{{$dataMinggu[$i]['date']}}</td>
            </tr>
        </tbody>
        @endfor
    </table>
</body>
</html>
