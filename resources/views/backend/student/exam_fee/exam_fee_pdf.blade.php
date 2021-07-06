<!DOCTYPE html>
<html>
<head>
<style>
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
}
</style>
</head>
<body>



    <table id="customers">
        <tr>
        <td><h2>
            @php
                $image_path = '/upload/easyschool.png'
            @endphp
            <img src="{{ public_path().$image_path }}" width="200" height="100" alt="">
        </h2></td>
        <td><h2>School Info</h2>
        <p>School address : Dositejeva 10/2</p>
        <p>School phone : 018/556-446 </p>
        <p>School email : school@gmail.com</p>
        <p><b>Student Exam Fee</b></p>
        </td>
        </tr>
    </table>
    @php
        $registrationfee = App\Models\FeeAmount::where('fee_category_id', '2')->where('class_id', $details->class_id)->first();
            $originalfee = $registrationfee->amount;
            $discount = $details['discount']['discount'];
            $discounttablefee = $discount / 100 * $originalfee;
            $finalfee = (float)$originalfee - (float)$discounttablefee;
    @endphp
<table id="customers">
    <tr>
        <th width="10%">SN</th>
        <th width="45%">Student details</th>
        <th width="45%">Student data</th>
    </tr>
    <tr>
        <td>1</td>
        <td><b>Student ID No</b></td>
        <td>{{ $details['student']['id_no'] }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td><b>Role No</b></td>
        <td>{{ $details->roll }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td><b>Student name</b></td>
        <td>{{ $details['student']['name'] }}</td>
    </tr>
    {{-- <tr>
        <td>4</td>
        <td><b>Father's Name </b></td>
        <td>{{ $details['student']['fname'] }}</td>
    </tr> --}}
    <tr>
        <td>5</td>
        <td><b>Session </b></td>
        <td>{{ $details['student_year']['name'] }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td><b> Class</b></td>
        <td>{{ $details['student_class']['name'] }}</td>
    </tr>
    <tr>
        <td>7</td>
        <td><b>Exam Fee</b></td>
        <td>{{ $originalfee .'$' }}</td>
    </tr>
    <tr>
        <td>8</td>
        <td><b>Discount Fee</b></td>
        <td>{{ $discount .'%'}}</td>
    </tr>
    <tr>
        <td>9</td>
        <td><b>Fee For this Student of {{ $exam_type }}</b></td>
        <td>{{ $finalfee .'$'}}</td>
    </tr>
    
</table>
<br>

<i style="font-size: 15px; float: left;">Print Data: {{ date("d M Y") }}</i><br>


<hr style="border:dashed 1px;width:95%;color:black;margin-bootom: 50px">


<table id="customers">
    <tr>
        <th width="10%">SN</th>
        <th width="45%">Student details</th>
        <th width="45%">Student data</th>
    </tr>
    <tr>
        <td>1</td>
        <td><b>Student ID No</b></td>
        <td>{{ $details['student']['id_no'] }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td><b>Role No</b></td>
        <td>{{ $details->roll }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td><b>Student name</b></td>
        <td>{{ $details['student']['name'] }}</td>
    </tr>
    {{-- <tr>
        <td>4</td>
        <td><b>Father's Name </b></td>
        <td>{{ $details['student']['fname'] }}</td>
    </tr> --}}
    <tr>
        <td>5</td>
        <td><b>Session </b></td>
        <td>{{ $details['student_year']['name'] }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td><b> Class</b></td>
        <td>{{ $details['student_class']['name'] }}</td>
    </tr>
    <tr>
        <td>7</td>
        <td><b>Exam fee</b></td>
        <td>{{ $originalfee .'$' }}</td>
    </tr>
    <tr>
        <td>8</td>
        <td><b>Discount Fee</b></td>
        <td>{{ $discount .'%'}}</td>
    </tr>
    <tr>
        <td>9</td>
        <td><b>Fee For this Student of {{ $exam_type }}</b></td>
        <td>{{ $finalfee .'$'}}</td>
    </tr>
    
</table>
<br>
<br>
<i style="font-size: 15px; float: left;">Print Data: {{ date("d M Y") }}</i>

</body>
</html>
