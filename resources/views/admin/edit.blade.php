@extends('AdminLayout')

@section('content')
    {{--@dd($promo);--}}
<div class="container">
    <h2 class="presentation">Editer un produit</h2><br  />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    {{--@dump($product)--}}
{{--    @dd($product->id);--}}
    <form method="post" action="{{action('AdminController@update', $product->id)}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name" required>Nom:</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="price">Prix:</label>
                <input type="text" class="form-control" name="price" value="{{$product->price}}">
            </div>
       </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="price">Poids:</label>
                <input type="text" class="form-control" name="weight" value="{{$product->weight}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="price">Stock:</label>
                <input type="text" class="form-control" name="stock" value="{{$product->stock}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label>Promo: </label>
                <select required name="promos_id">
                    <option value="0">aucun</option>
                @foreach($promo as $id)

                    {{--<option value="{{$id['id']}}" selected>{{$id['name']}}</option>--}}

                        <option value="{{$id['id']}}">{{$id['name']}}</option>

                @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="price">Description:</label>
                <textarea class="form-control" name="description">{{$product->description}}</textarea>
            </div>
        </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Mettre à jour</button>
        </div>
    </div>
    </form>


@endsection