@extends('layouts.components.master')
@section('contents')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Action Plans</h3>
    </div>
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Financial Years</th>
                    <th>Months</th>
                    <th>Monsoon</th>
                    <th>Category of PIA</th>
                    <th>Report File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                @foreach($data as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$items->financial_year}} </td>
                    <td>{{$items->months}}</td>
                    <td>{{$items->monsoon}}</td>
                    <td>{{$items->category_of_PIA}}</td>
                    <td>
                        <a href="{{ url('upload/ReportFile/'.$items->report_file)}}" target="_blank">VIEW</a>
                    </td>
                    <td>
                        <a class="btn brn-denger" href="{{url('deletedata')}}/{{$items->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection