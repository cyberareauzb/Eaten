@extends('layouts.dashmain')
@section('content')
    <div class="utf_dashboard_content">

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="utf_dashboard_stat color-1">
                    <div class="utf_dashboard_stat_content">
                        <h4>{{$lcount}}</h4>
                        <span>Jami E'lonlar</span>
                    </div>
                    <div class="utf_dashboard_stat_icon"><i class="im im-icon-Map2"></i></div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="utf_dashboard_stat color-2">
                    <div class="utf_dashboard_stat_content">
                        <h4>{{$approve}}</h4>
                        <span>Tasdiqdan o'tgan</span>
                    </div>
                    <div class="utf_dashboard_stat_icon"><i class="im im-icon-Add-UserStar"></i></div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="utf_dashboard_stat color-6">
                    <div class="utf_dashboard_stat_content">
                        <h4>211</h4>
                        <span>Jami ko'rilgan</span>
                    </div>
                    <div class="utf_dashboard_stat_icon"><i class="im im-icon-Eye-Visible"></i></div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="utf_dashboard_stat color-4">
                    <div class="utf_dashboard_stat_content">
                        <h4>0</h4>
                        <span>Jami buyurtmalar</span>
                    </div>
                    <div class="utf_dashboard_stat_icon"><i class="im im-icon-Diploma"></i></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="utf_dashboard_list_box table-responsive recent_booking">
                    <h4>Oxirgi e'lonlarim</h4>
                    <div class="dashboard-list-box table-responsive invoices with-icons">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rasmi</th>
                                    <th>Nomi</th>
                                    <th>Buyurtma muddati</th>
                                    <th>O'rtacha Reytinggi</th>
                                    <th>Status</th>
                                    <th align="right">Uskunalar</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($listings as  $listing)
                                <tr>
                                    <td>{{$listing->id}}</td>
                                    <td><img alt="" class="img-fluid rounded-circle shadow-lg" src="{{$listing->img}}" style="object-fit: cover; height: 50px; width: 50px"></td>
                                    <td>{{$listing->nameuz}}</td>
                                    <td>{{$listing->expry_date}}</td>
                                    <td>{{$listing->rating ?? '0'}}</td>
                                    <td><span class="badge badge-pill badge-primary text-uppercase">{{$listing->status}}</span></td>
                                    <td align="right">
                                        <a href="#" style="background-color: aquamarine; padding: 4px" class="button gray"><i style="margin-right: 0px" class="fa fa-pencil"></i></a>
                                        <a href="/listing/{{$listing->id}}" style="padding: 4px" class="button gray"><i style="margin-right: 0px" class="fa fa-eye"></i></a>
                                        <a href="/del-listing/{{$listing->id}}" style="background-color: red; padding: 4px" class="button gray"><i style="margin-right: 0px" class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
