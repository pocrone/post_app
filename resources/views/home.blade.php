@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                Sukses memperbarui data kamu
                            </div>
                        @elseif (session('failed'))
                            <div class="alert alert-danger" role="alert">
                                Sukses memperbarui data kamu
                            </div>
                        @endif

                        <table class="table" id='detail-post'>
                            <thead>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>

                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->desc }}</td>
                                        <td><a href="{{ route('edit.post', $row->id) }}" class="btn btn-primary">Edit</a>
                                            <form method="POST" action="{{ route('delete.post', $row->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <div class="form-group">
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add Form') }}</div>

                    <div class="card-body">
                        <form action="{{ route('store.post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Title</label>
                                <input type="text" class="form-control" name="title" id="title_input"
                                    placeholder="Masukkan Judul">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="desc" id="desc_input" rows="3"></textarea>
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
