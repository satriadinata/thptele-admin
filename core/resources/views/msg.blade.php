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
                <td><b>{{$value->firstname}}</b></td>
                <td><b>{{$value->chat_id}}</b></td>
                <td><b>{{$value->date}}</b></td>
                <td>{{$value->text}}</td>
                <td style="display: flex;" ><b><a style="margin: 2px; padding: 10px; font-size: 12px;"  href="{{url('reply').'/'.$value->id}}" class="btn btn-primary" >Reply</a><a style="margin: 2px; padding: 10px; font-size: 12px;" onclick="hapus(<?php echo $value->id; ?>)" class="btn btn-danger" >Delete</a></b></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div class="tm-bg-primary-dark tm-block tm-block-h-auto">
    {{$data->render()}}
</div>