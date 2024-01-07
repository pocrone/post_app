@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit Form') }}</div>

                    <div class="card-body">
                        <form action="{{ route('update.post', $data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Title</label>
                                <input type="text" class="form-control" name="title" id="title_input"
                                    placeholder="Masukkan Judul" value="{{ $data->title }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="desc" id="desc_input" rows="3">{{ $data->desc }}</textarea>
                            </div>

                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#detail-post').DataTable();
    </script>
@endpush
