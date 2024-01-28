@extends('layouts.dashmain')
@section('content')

    <div class="utf_dashboard_content">
        <div id="titlebar" class="dashboard_gradient">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mening Buyurtmalarim</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="margin-top-0">


                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="utf_dashboard_list_box invoices with-icons margin-top-20">
                                <h4 style="color: #0c1347">Mening buyurtmalarim</h4>
                                <ul>
                                    @foreach($books as $book)
                                        <li>
                                            <i class="utf_list_box_icon fa fa-paste"></i> <strong>$ {{$book->summ + $book->tax}}  <span class="paid">{{$book->paystatus}}</span></strong>
                                            <p>{{$book->listingname}}</p>
                                            <ul>
                                                <li><span>Buyurtma raqami:-</span> {{$book->id}}</li>
                                                <li><span>Sana:-</span> {{$book->datetime}}</li>
                                            </ul>
                                            <div class="buttons-to-right"> <a href="/invioce/{{$book->id}}" class="button gray"><i class="sl sl-icon-printer"></i> To'lov varaqasi</a> </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
