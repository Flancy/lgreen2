@extends('layouts.app')
@section('content')
<div id="csrf">{{ csrf_token() }}</div>
<div id="fh5co-main" class="price">
    <div class="container spacing">
        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInUp">Прайс лист</h2>
        <div class="row">
            <table class="table table-bordered">
                <thead class="thead">
                    <tr>
                        <th scope="col-md-4"><b>Наименование товара</b></th>
                        <th scope="col-md-4"><b>Цена розница</b></th>
                        <th scope="col-md-4"><b>Цена опт</b></th>
                        <th scope="col-md-4"><b>Количество</b></th>
                        <th scope="col-md-4"><b>Покупка</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->price }}</td>
                            <td>{{ $post->priceOpt }}</td>
                            <td><input type="text" class="form-control" id="col" placeholder="Кол-во"></td>
                            <td><center><button type="button" class="btn btn-primary modalOrderPrice" data-toggle="modal" data-target="#exampleModalPrice">Сделать заказ</button></center></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>

    <div class="modal fade" id="exampleModalPrice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Купить <span class="titlePriceItem"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Надо добавить в форму конфигурацию .php -->
                    <form method="POST" action="{{ url('mailPriceList') }}">
                        @csrf
                        <input type="hidden" name="item">
                        <input type="hidden" name="count">
                        <label for="name">Имя <font color="red">*</font></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя">
                        <br>
                        <label for="email">Email <font color="red">*</font></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Ваш Email">
                        <br>
                        <label for="phone">Номер телефона <font color="red">*</font></label>
                        <input type="phone" name="phone" class="form-control" id="phone" placeholder="Ваш номер телефона">
                        <hr>
                        <p>Пункты отмеченные <font color="red">*</font> обязательны к заполнению.</p>
                        <hr>
                        <p>Наш сотрудник свяжется с вами в кротчайшие сроки.</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Выйти</button>
                            <button type="submit" class="btn btn-primary">Заказать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection