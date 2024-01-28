@extends('layouts.dashmain')
@section('content')

    <div class="utf_dashboard_content">
        <div class="row">
            <div class="col-lg-12">
                <div id="utf_add_listing_part">
                    <div class="add_utf_listing_section"  style="margin-bottom: 30px">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div id="utf_add_listing_part">
                    <div class="add_utf_listing_section"  style="margin-bottom: 30px">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div id="utf_add_listing_part">
                    <div class="add_utf_listing_section">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
