@extends('AdminCategoryLayout')
@section('MetaTitle', 'Homepage Admin')
@section('content')
<div class="container">
    <br />
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Category as $categorie)
            <tr>
                <td>{{$categorie['id']}}</td>
                <td>{{$categorie['name']}}</td>
                <td><a href="{{action('CategoryController@edit', $categorie['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('CategoryController@destroy', $categorie['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection