@extends('dashboard.master')


@section('content')
    <div class="text-center">
        <h3 class="display-5">WELCOME</h3>
        <h1 class="display-5">TO</h1>
        <div class="display-2">
            {{ config('app.name') }}
        </div>
    </div>
    <legend>Developed By:</legend>
    <table class="table table-bordered">
        <tr>
            <td>
                <b> Nusrat Adury</b> <br>
                ID: 121-121-121 <br>
                Department of CSE <br>
                University of Global Village
            </td>
            <td>
                <b> Nusrat Adury</b> <br>
                ID: 121-121-121 <br>
                Department of CSE <br>
                University of Global Village
            </td>
            <td>
                <b> Nusrat Adury</b> <br>
                ID: 121-121-121 <br>
                Department of CSE <br>
                University of Global Village
            </td>
        </tr>
    </table>
@endsection
