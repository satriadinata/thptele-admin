        @extends('layouts.app')

        @section('content')
        <div class="container mt-5">
          <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
              <div class="tm-bg-primary-dark tm-block tm-block-products">
                <a
                href="{{route('tambahkey')}}"
                class="btn btn-primary btn-block text-uppercase mb-3">Add new key</a> 
                <div class="tm-product-table-container">
                  <table class="table table-hover tm-table-small tm-product-table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Key</th>
                        <th scope="col">Reply</th>
                        <th scope="col">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $key => $value):?>
                        <tr>
                          <td  onclick="edit(<?php echo  $value->id ?>)" class="tm-product-name">{{$key+1}}</td>
                          <td  onclick="edit( <?php echo   $value->id ?>)">{{$value->keycode}}</td>
                          <td onclick="edit( <?php echo  $value->id ?> )" >{{$value->msg}}</td>
                          <td>
                            <a href="#" class="tm-product-delete-link">
                              <i class="far fa-trash-alt tm-product-delete-icon" onclick="hapus(<?php echo $value->id; ?>)" ></i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- table container -->
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
              <div class="tm-bg-primary-dark tm-block tm-block-product-categories" style="align-items: center; display: flex;">
                <div class="col-12 text-center">
                  <img style="width: 100px; margin-bottom: 10px;" src="{{asset('img/logo.png')}}">
                  <h2 class="tm-block-title mb-4">Default Message is on top list</h2>
                </div>
              </div>
            </div>
            <script>
              function hapus(id)
              {
                var confirm=window.confirm('Sure ?');
                if (confirm) {
                  window.location.href='<?php echo url('hapuskey') ?>'+'/'+id;
                }
              }
              function edit(id){
                window.location.href='<?php echo url('editkey') ?>'+'/'+id;
              }
            </script>
            @endsection