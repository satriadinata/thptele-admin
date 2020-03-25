@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <p class="text-white mt-5 mb-5">Sent Messages</p>
    </div>
</div>
<!-- row -->
<div class="tm-bg-primary-dark tm-block tm-block-h-auto">
    <div class="form-group mb-3">
        <form method="post" action="{{route('srcsent')}}" >
            @csrf
            <label for="key">Search </label>
            <input id="key" name="key" type="text" class="form-control validate" placeholder="search anythings" required >
            <input type="submit" style="display: none;">
        </form>
    </div>
</div>
<div class="col" style="margin-bottom: -30px;" >
    <p class="text-white mt-5 mb-5">
        <a  id="hpsall" style="padding: 10px; font-size: 12px; margin: 3px; "  class="btn btn-danger" >Delete</a><a id="checkall" style="padding: 10px; font-size: 12px; margin: 3px; " class="btn btn-success" >Select All</a> <a id="uncheckall" style="padding: 10px; font-size: 12px; margin: 3px; " class="btn btn-success" >Unselect All</a>
    </p>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col" style="display: flex;" ></th>
            <th scope="col">NO</th>
            <th scope="col">USERNAME</th>
            <th scope="col">NAME</th>
            <th scope="col">CHAT ID</th>
            <th scope="col">DATE</th>
            <th scope="col">MESSAGE</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value) :?>
            <tr>
                <th scope="row" style="text-align: center;" ><input type="checkbox" class="chck" id="cek" data-id="{{$value->id}}"></th>
                <th scope="row"><b>{{$key+1}}</b></th>
                <td>
                    <div class="tm-status-circle moving">
                    </div>{{$value->username}}
                </td>
                <td><b>{{$value->name}}</b></td>
                <td><b>{{$value->chat_id}}</b></td>
                <td><b>{{$value->datetime}}</b></td>
                <td>{{$value->message}}</td>
                <td style="display: flex;" ><b><a style="margin: 2px; padding: 10px; font-size: 12px;" onclick="hapus(<?php echo $value->id; ?>)" class="btn btn-danger" >Delete</a></b></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
<script>
     $("#hpsall").on('click', function(e){
        var all=[];
        $('.chck:checked').each(function(e){
            all.push($(this).attr('data-id'));
        });
        console.log(all);
        if (all.length<1) {
            alert('Select First');
        }else{
            alert('Wait Until Reload');
            all.forEach((value)=>{
                $.ajax({
                    method:'get',
                    url:'<?php echo url('hapussent') ?>'+'/'+value,
                    success:function(data){
                        console.log(data.id);
                        console.log(all[all.length-1]);
                        if (data.id==all[all.length-1]) {
                            setInterval(window.location.reload(),500);
                        }
                    }
                });
            });
        }
        // window.location.reload();
    });
    function hapus(id)
    {
        var confirm=window.confirm("Sure ?");
        if (confirm) {
            $.ajax({
                method:'get',
                url:'<?php echo url('delsent') ?>'+'/'+id,
                success:function(data){
                    window.location.reload();
                }
            });
        }
    }
    $("#checkall").on('click', function(e){
        $(':checkbox').each(function(){
            this.checked=true;
        });
    });
    $("#uncheckall").on('click', function(e){
        $(':checkbox').each(function(){
            this.checked=false;
        });
    });
</script>
@endsection