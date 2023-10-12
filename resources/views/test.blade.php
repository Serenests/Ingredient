<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        @import url( {{asset('css/style.css')}});
    </style>
</head>
<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <nav>
                        <ul>
                            <li><a href="">check employee attendance</a></li>
                            <li><a href="">employee</a></li>
                        </ul>
                    </nav>
                    <div class="container">
                        <h2>เพิ่มพนักงาน</h2>
                        <div class="row">
                            <div class="col-6">
                                <label for="name">name:</label><br>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="col-6">
                                <label for="lname">last name:</label><br>
                                <input type="text" name="lname" id="lname">
                            </div>
                            <div class="col-12">
                                <label for="salary">Salary:</label><br>
                                <input type="text" name="salary" id="salary">
                            </div>
                            <div class="col-6">
                                <p>Address</p>
                                <label>บ้านเลขที่:</label><br>
                                <input type="text" name="empaddr" id="lname">
                            </div>
                            <div class="col-6">
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>
