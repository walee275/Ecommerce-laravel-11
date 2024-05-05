<div class="table-responsive">
    @if(count($this->banners))
    <table class="table table-bordered table-hover" id="banner-dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Slug</th>
          <th>Photo</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($this->banners as $banner)
            <tr>
                <td>{{$banner->id}}</td>
                <td>{{$banner->title}}</td>
                <td>{{$banner->slug}}</td>
                <td>
                    @if($banner->photo)
                        <img src="{{$banner->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$banner->photo}}">
                    @else
                        <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                    @endif
                </td>
                <td>
                    @if($banner->status=='active')
                        <span class="badge badge-success">{{$banner->status}}</span>
                    @else
                        <span class="badge badge-warning">{{$banner->status}}</span>
                    @endif
                </td>
                <td>
                    <a wire:navigate href="{{route('banner.edit',$banner->id)}}" class="float-left mr-1 btn btn-primary btn-sm" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{route('banner.destroy',[$banner->id])}}">
                      @csrf
                      @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$banner->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                {{-- Delete Modal --}}
                {{-- <div class="modal fade" id="delModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$user->id}}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content"><!-- Visit 'codeastro' for more projects -->
                        <div class="modal-header">
                          <h5 class="modal-title" id="#delModal{{$user->id}}Label">Delete user</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('banners.destroy',$user->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>
                          </form>
                        </div>
                      </div>
                    </div>
                </div> --}}
            </tr>
        @endforeach
      </tbody>
    </table>
    <span style="gap-2">{{$this->banners->links()}}</span>
    @else
      <h6 class="text-center">No banners found!!! Please create banner</h6>
    @endif
  </div>
