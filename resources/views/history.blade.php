<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ประวัติการสั่งซื้อ</title>
    <style>
        table,th,td
        {
            border: 2px solid black;
            border-collapse: collapse;
            padding: 4px;
        }
        table{
            width: 400px;
        }
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <h2>ประวัติการสั่งซื้อ</h2>

    <table>
        <tr>
            <th>ประเภทวัตถุดิบ</th>
            <th>ชื่อวัตถุดิบ</th>
            <th>จำนวนที่สั่ง</th>
            <th>หน่วยวัด</th>
            <th>วันเวลาที่สั่ง</th>
        </tr>

        @foreach ( $list as $ingre)
        <tr>
            <td>
                {{$ingre->ingredientType->name_type}}
            </td>
            <td>
                {{$ingre->name_list}}
            </td>
            <td>
                {{$ingre->amount}}
            </td>
            <td>
                {{$ingre->unitOfMeasurement->name_unit}}
            </td>
            <td>
                {{$ingre->updated_at}}
            </td>
        </tr>
        @endforeach

    </table>
</body>
</html>
