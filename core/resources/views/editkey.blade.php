        @extends('layouts.app')

        @section('content')
        <div class="container tm-mt-big tm-mb-big">
          <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
              <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                  <div class="col-12">
                    <h2 class="tm-block-title d-inline-block">Add Key</h2>
                  </div>
                </div>
                <div class="row tm-edit-product-row">
                  <div class="col-xl-6 col-lg-6 col-md-12">
                    <form action="{{url('upedit').'/'.$data->id}}" method="post"  class="tm-edit-product-form">
                      @csrf
                      <div class="form-group mb-3">
                        <label
                        for="key"
                        >Key Code
                      </label>
                      <input
                      id="key"
                      name="keycode"
                      type="text"
                      class="form-control validate"
                      required
                      value="{{$data->keycode}}"
                      />
                    </div>
                    <div class="form-group mb-3">
                      <input type="hidden" name="">
                      <label
                      for="msg"
                      >Replys</label
                      >
                      <textarea cols="40"
                      
                      id="msg"
                      name="msg"
                      class="form-control validate"
                      rows="3"
                      required
                      ><?php echo $data->msg; ?></textarea>
                    </div>

                  <div class="row">
                  </div>

                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Update KEy</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection