<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สั่งวัตถุดิบ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="{{ asset('order.css') }}">


</head>
<body>

    <div class="container">
    <br><h2>สั่งวัตถุดิบ</h2>
    <form action="/order/add" method="POST">
        @csrf
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ประเภทวัตถุดิบ</th>
                        <th>ชื่อวัตถุดิบ</th>
                        <th>จำนวน</th>
                        <th>หน่วย</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-select" name="type" id="type"  >
                                @foreach ($type as $types)
                                    <option value={{$types->id}} >{{$types->name_type}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="name" id="name" required  >
                                <optgroup label="เนื้อ" id="optgroupMeat">
                                    @foreach ($meat as $meats)
                                        <option value="{{$meats->id}}">{{$meats->name_th}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="หมู" id="optgroupPork">
                                    @foreach ($pork as $porks)
                                        <option value="{{$porks->id}}">{{$porks->name_th}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="ไก่" id="optgroupChicken">
                                    @foreach ($chicken as $chickens)
                                        <option value="{{$chickens->id}}">{{$chickens->name_th}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="อาหารทะเล" id="optgroupSeafood">
                                    @foreach ($seafood as $seafoods)
                                        <option value="{{$seafoods->id}}">{{$seafoods->name_th}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="ผัก" id="optgroupVegetable">
                                    @foreach ($vegetable as $vegetables)
                                        <option value="{{$vegetables->id}}">{{$vegetables->name_th}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="ผลไม้" id="optgroupFruit">
                                    @foreach ($fruit as $fruits)
                                        <option value="{{$fruits->id}}">{{$fruits->name_th}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="ของหวาน" id="optgroupDessert">
                                    @foreach ($dessert as $desserts)
                                        <option value="{{$desserts->id}}">{{$desserts->name_th}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="เครื่องดื่ม" id="optgroupDrink">
                                    @foreach ($drink as $drinks)
                                        <option value="{{$drinks->id}}">{{$drinks->name_th}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </td>
                        <td>
                            <input class="form-control-center" type="number" id="amount" name="amount" min="1" max="100" value="1">
                        </td>
                        <td>
                            <select class="form-select" name="unit" id="unit" required disabled>
                                @foreach ($unit as $units)
                                    <option value="{{$units->id}}">{{$units->name_unit}} </option >
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="สั่งวัตถุดิบ" id="submitBtn">
    </form>

    <br><h2>รายการสั่งวัตถุดิบ</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ชื่อวัตถุดิบ</th>
                <th>จำนวนที่สั่ง</th>
                <th>วันเวลาที่สั่ง</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $lists)
            <tr>
                <td>{{$lists->Ingredient_names->name_th}}</td>
                <td>{{$lists->amount}}</td>
                <td>{{$lists->updated_at}}</td>
                <td><a class="btn btn-danger" href="/order/delete/{{$lists->id}}" onclick="return confirm('คุณต้องการลบรายการนี้ใช่หรือไม่')">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
        const typeSelect = document.getElementById('type');
        const nameSelect = document.getElementById('name');
        const optgroupMeat = document.getElementById('optgroupMeat');
        const optgroupPork = document.getElementById('optgroupPork');
        const optgroupChicken = document.getElementById('optgroupChicken');
        const optgroupSeafood = document.getElementById('optgroupSeafood');
        const optgroupVegetable = document.getElementById('optgroupVegetable');
        const optgroupFruit = document.getElementById('optgroupFruit');
        const optgroupDessert = document.getElementById('optgroupDessert');
        const optgroupDrink = document.getElementById('optgroupDrink');
        const unitSelect = document.getElementById('unit');

        window.addEventListener('DOMContentLoaded', function() {
            optgroupMeat.style.display = 'block';
            optgroupPork.style.display = 'none';
            optgroupChicken.style.display = 'none';
            optgroupSeafood.style.display = 'none';
            optgroupVegetable.style.display = 'none';
            optgroupFruit.style.display = 'none';
            optgroupDessert.style.display = 'none';
            optgroupDrink.style.display = 'none';
        });

        // เพิ่ม Event Listener เพื่อตรวจสอบเมื่อมีการเปลี่ยนแปลงค่าใน select type
        typeSelect.addEventListener('change', function() {
            const selectedType = typeSelect.value
            // ซ่อนทุก optgroup ก่อนที่จะแสดงอันที่ถูกเลือก
            optgroupMeat.style.display = 'none';
            optgroupPork.style.display = 'none';
            optgroupChicken.style.display = 'none';
            optgroupSeafood.style.display = 'none';
            optgroupVegetable.style.display = 'none';
            optgroupFruit.style.display = 'none';
            optgroupDessert.style.display = 'none';
            optgroupDrink.style.display = 'none';

            // เพิ่มเงื่อนไขเพื่อแสดง optgroup ที่ถูกเลือก
            if (selectedType === '1') {
                optgroupMeat.style.display = 'block';
                nameSelect.querySelector('optgroup[label="เนื้อ"] option').selected = true;
            }
            else if (selectedType === '2') {
                optgroupPork.style.display = 'block';
                nameSelect.querySelector('optgroup[label="หมู"] option').selected = true;
            }
            else if (selectedType === '3') {
                optgroupChicken.style.display = 'block';
                nameSelect.querySelector('optgroup[label="ไก่"] option').selected = true;
            }
            else if (selectedType === '4') {
                optgroupSeafood.style.display = 'block';
                nameSelect.querySelector('optgroup[label="อาหารทะเล"] option').selected = true;
            }
            else if (selectedType === '5') {
                optgroupVegetable.style.display = 'block';
                nameSelect.querySelector('optgroup[label="ผัก"] option').selected = true;
            }
            else if (selectedType === '6') {
                optgroupFruit.style.display = 'block';
                nameSelect.querySelector('optgroup[label="ผลไม้"] option').selected = true;
            }
            else if (selectedType === '7') {
                optgroupDessert.style.display = 'block';
                nameSelect.querySelector('optgroup[label="ของหวาน"] option').selected = true;
            }
            else if (selectedType === '8') {
                optgroupDrink.style.display = 'block';
                nameSelect.querySelector('optgroup[label="เครื่องดื่ม"] option').selected = true;
            }

                // ตรวจสอบค่าที่เลือกและอัปเดต select unit
            if (selectedType === '1' || selectedType === '2' || selectedType === '3' || selectedType === '4' || selectedType === '5' || selectedType === '6') {
                unitSelect.value = '1';
                unitSelect.disabled = true; // ทำให้เป็น "read-only" โดยปิดใช้งาน
            }
            else if(selectedType === '7'){
                unitSelect.value = '4';
                unitSelect.disabled = true;
            }
            else if(selectedType === '8'){
                unitSelect.value = '3';
                unitSelect.disabled = true;
            }
        });


</script>

</body>
</html>
