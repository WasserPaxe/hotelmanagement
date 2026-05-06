@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach($errors->all() as $error)
    <strong>{{$error}}</strong>
    <button  class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @endforeach
</div>
@endif