@extends('layouts.dashmain')
@section('content')

    @if(auth()->user()->role == 'vendor')
        <div class="utf_dashboard_content">
            <div id="titlebar" class="dashboard_gradient">
                <div class="row">
                    <div class="col-md-12">
                        {{--                    <h2>E'lon joylash</h2>--}}
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="index_1.html">Bosh sahifa</a></li>
                                <li><a href="dashboard.html">Kabinet</a></li>
                                <li>E'lon joylash</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <form action="listad" method="POST" id="addlform">
                @csrf

                <div class="row">
                    <div class="col-lg-12">
                        <div id="utf_add_listing_part">
                            <div class="add_utf_listing_section">
                                <div class="utf_add_listing_part_headline_part">
                                    <h3><i class="sl sl-icon-tag"></i> Asosiy ma'lumotlar</h3>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <h5>Sarlavha</h5>
                                        <input type="text" class="search-field" name="nameuz" id="listing_title"
                                               placeholder="E'lon sarlavhasi" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Telefon</h5>
                                        <input type="tel" name="phone" id="keywords" placeholder="+998 99 --- -- --"
                                               value="">
                                    </div>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-6">
                                        <h5>E'lon turi</h5>
                                        <div class="intro-search-field utf-chosen-cat-single">
                                            <select name="listing_type_id" class="selectpicker default"
                                                    title="E'lon turini tanlang">
                                                @foreach($listTypes as $listType)
                                                    <option value="{{$listType->id}}">{{$listType->nameuz}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Kategoriyasi</h5>
                                        <div class="intro-search-field utf-chosen-cat-single">
                                            <select name="category_id" class="selectpicker default"
                                                    title="Kategoriyani tanlang">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->nameuz}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Batafsil ma'lumot</h5>
                                        <textarea class="search-field" name="descriptionuz"
                                                  placeholder="Batafsil ma'lumot">  </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="add_utf_listing_section margin-top-45">
                                <div class="utf_add_listing_part_headline_part">
                                    <h3><i class="sl sl-icon-map"></i> Manzili</h3>
                                </div>
                                <div class="utf_submit_section">
                                    <div class="row with-forms">
                                        <div class="col-md-6">
                                            <h5>Viloyat</h5>
                                            <div class="intro-search-field utf-chosen-cat-single">
                                                <select name="region_id" id="vils" class="selectpicker default"
                                                        title="Viloyatni tanlang">
                                                    @foreach($regions as $region)
                                                        <option value="{{$region->id}}">{{$region->nameuz}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Tuman</h5>
                                            <div class="intro-search-field utf-chosen-cat-single">
                                                <select name="tuman_id" id="tum" class="selectpicker default"
                                                        title="Tumanni tanlang">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Manzil</h5>
                                            <input type="text" class="input-text" name="addressuz" id="address"
                                                   placeholder="Manzilni kiriting" value="">
                                        </div>

                                        <div id="utf_listing_location" class="col-md-12 utf_listing_section">
                                            <div id="utf_single_listing_map_block">
                                                <div id="map" data-lat="39.66900592943495"
                                                     data-long="66.98879241943361"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>Lokatsiya uchun Koordinata</h5>
                                            <div class="row with-forms">
                                                <div class="col-md-6">
                                                    <input type="text" class="input-text" name="latitude" id="latitude"
                                                           placeholder="kenglik">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="input-text" name="longitude" id="longitude"
                                                           placeholder="uzunlik">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="add_utf_listing_section margin-top-45">
                                <div class="utf_add_listing_part_headline_part">
                                    <h3><i class="sl sl-icon-picture"></i> Rasmlar</h3>
                                </div>
                                <div class="row with-forms">
                                    <div class="utf_submit_section col-md-6 oneimg">
                                        <h4>Asosiy</h4>
                                        <input type="file" name="img" class="dropzone" id="mainimg">
                                    </div>
                                    <div class="utf_submit_section col-md-6 galerr">
                                        <h4>Galereya</h4>
                                        <input type="file" name="gallery" class="dropzone" id="galer" multiple>
                                    </div>
                                </div>
                            </div>


                            <div class="add_utf_listing_section margin-top-45">
                                <div class="utf_add_listing_part_headline_part" style="display: flex; justify-content: space-between">
                                    <h3><i class="sl sl-icon-home"></i> Qulayliklar</h3>
                                    <button type="button" class="button allconv">Barchasi</button>
                                </div>
                                <div class="checkboxes in-row amenities_checkbox">
                                    <ul>
                                        @foreach($conveniences as $convenience)
                                            <li>
                                                <input id="conv{{$convenience->id}}" value="{{$convenience->id}}"
                                                       type="checkbox" name="conveniences" class="conveniences convcheck">
                                                <label for="conv{{$convenience->id}}">{{$convenience->nameuz}}</label>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <div class="row utf_opening_day utf_js_demo_hours">
                                    <div class="col-md-12">
                                        <h5>Qabul qilinadigan mexmonlar soni</h5>
                                        <input type="number" name="client_count">
                                    </div>
                                </div>
                            </div>

                            <div class="add_utf_listing_section margin-top-45">
                                <div class="utf_add_listing_part_headline_part">
                                    <h3><i class="sl sl-icon-clock"></i> Vaqtlar</h3>
                                </div>
                                <div class="switcher-content">
                                    <div class="row utf_opening_day utf_js_demo_hours">
                                        <div class="col-md-2">
                                            <h5>Tugash sanasi:-</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="datetime-local" name="end_date">
                                        </div>
                                        <div class="col-md-2">
                                            <h5>Buyurtma qilish muddati:-</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="datetime-local" name="expry_date">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="add_utf_listing_section margin-top-45">
                                <div class="utf_add_listing_part_headline_part" style="display: flex; justify-content: space-between">
                                    <h3><i class="sl sl-icon-tag"></i> Taomlar</h3>
                                    <button type="button" class="button allfoods">Barchasi</button>
                                </div>
                                <div class="checkboxes in-row amenities_checkbox">
                                    <ul>
                                        @foreach($foods as $food)
                                            <li>
                                                <input id="food{{$food->id}}" value="{{$food->id}}" type="checkbox"
                                                       name="foods" class="foods foodcheck">
                                                <label for="food{{$food->id}}">{{$food->nameuz}}</label>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>


                            <button type="submit" class="button preview">Save & Preview</button>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="footer_copyright_part">Copyright © 2022 All Rights Reserved.</div>
                    </div>
                </div>
            </form>
        </div>
@else
    <div class="utf_dashboard_content">
        <div id="titlebar" class="dashboard_gradient">
            <div class="row">
                <div class="col-md-12">
                    {{--                    <h2>E'lon joylash</h2>--}}
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="index_1.html">Bosh sahifa</a></li>
                            <li><a href="dashboard.html">Kabinet</a></li>
                            <li>E'lon joylash</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <form action="listad" method="POST" id="addlform">
            @csrf

            <div class="row">
                <div class="col-lg-12">
                    <div id="utf_add_listing_part">
                        <div class="add_utf_listing_section " >
                            <div class="utf_add_listing_part_headline_part">
                                <h3><i class="sl sl-icon-info"></i> E`lon joylash uchun o`zingiz haqingizdagi ma`lumotlarni to'ldiring</h3>
                            </div>

                            <a href="/profile" class="button  preview">Hoziroq To'ldirish</a>
                        </div>


                    </div>

                </div>
                <div class="col-md-12">
                    <div class="footer_copyright_part">Copyright © 2022 All Rights Reserved.</div>
                </div>
            </div>
        </form>
    </div>
@endif
    <script src="/scripts/leaflet.js"></script>
    <script>
    let foodsStatus = false
    let convStatus = false
    let flists = document.querySelectorAll('.foodcheck')
    let clists = document.querySelectorAll('.convcheck')
    document.querySelector('.allfoods').addEventListener('click', ()=>{
        foodsStatus = !foodsStatus
        flists.forEach(i=>i.checked = foodsStatus)
    })
    document.querySelector('.allconv').addEventListener('click', ()=>{
        convStatus = !convStatus
        clists.forEach(i=>i.checked = convStatus)
    })
        let mapcontainer = document.querySelector('#map')
        let lat = Number(mapcontainer.dataset.lat)
        let long = Number(mapcontainer.dataset.long)

        //
        // let oldmarker;
        // let marker;

        const map1 = L.map('map', {
            zoomControl: false,
            attributionControl: false
        }).setView([lat, long], 13);
        const attribution = '';
        const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        const tiles = L.tileLayer(tileUrl, {attribution});
        tiles.addTo(map1);
        var marker = L.marker([lat, long]).addTo(map1);
        var popup = L.popup();
        var lant = marker.getLatLng();

        function onMapClick(e) {
            marker.setLatLng([e.latlng.lat, e.latlng.lng]);
            lant = marker.getLatLng();
            document.querySelector('#latitude').value = e.latlng.lat
            document.querySelector('#longitude').value = e.latlng.lng
        }

        map1.on('click', onMapClick);
        lant = marker.getLatLng();


        let MImg = document.querySelector('#mainimg')
        let mimg;
        MImg.addEventListener('change', () => {
            console.dir(MImg.files[0])
            let fd = new FormData();
            fd.append('image', MImg.files[0])
            fetch('https://admin.eaten.uz/api/upload-file', {
                method: 'POST',
                body: fd
            }).then(res => res.json()).then(f => {
                console.log(f)
                let im = document.createElement('img')
                im.setAttribute('src', f.data.image)
                im.style.width = '60px'
                im.style.height = '60px'
                document.querySelector('.oneimg').append(im)
                mimg = f.data.image
            })
        })
        let galeryImages = []
        let GImg = document.querySelector('#galer')
        GImg.addEventListener('change', () => {
            console.dir(GImg.files)
            let fd = new FormData();
            for (let i = 0; i < GImg.files.length; i++) {
                fd.append('image', GImg.files[i])
            }
            fetch('https://admin.eaten.uz/api/upload-file', {
                method: 'POST',
                body: fd
            }).then(res => res.json()).then(f => {
                console.log(f)
                let im = document.createElement('img')
                im.setAttribute('src', f.data.image)
                im.style.width = '60px'
                im.style.height = '60px'
                document.querySelector('.galerr').append(im)
                // MImg.value = f.data.image
                galeryImages.push(f.data.image)
            })
        })

        let addform = document.querySelector('#addlform')
        addform.addEventListener('submit', (e) => {
            e.preventDefault()
            let conven = document.querySelectorAll('.conveniences')
            console.log(conven)
            let convs = []
            conven.forEach(conv => {
                if (conv.checked) {
                    convs.push(conv.value)
                }
            })
            console.log(convs)

            let fdsI = document.querySelectorAll('.foods')
            console.log(fdsI)
            let fds = []
            fdsI.forEach(conv => {
                if (conv.checked) {
                    fds.push(conv.value)
                }
            })
            console.log(fds)


            let data = {
                _token: addform._token.value,
                nameuz: addform.nameuz.value,
                img: mimg,
                addressuz: addform.addressuz.value,
                location: JSON.stringify({lat: addform.latitude.value, lng: addform.longitude.value}),
                phone: addform.phone.value,
                descriptionuz: addform.descriptionuz.value,
                gallery: JSON.stringify(galeryImages),
                client_count: addform.client_count.value,
                tuman_id: addform.tuman_id.value,
                region_id: addform.region_id.value,
                listing_type_id: addform.listing_type_id.value,
                category_id: addform.category_id.value,
                conveniences: convs,
                end_date: addform.end_date.value,
                expry_date: addform.expry_date.value,
                foods: fds,
            }

            console.log(data)

            fetch('https://eaten.uz/listad', {
                method:'POST',
                headers: {
                  "Content-type": 'application/json'
                },
                body: JSON.stringify(data)
            }).then(res=>res.json()).then(j=>alert(j.status))
        })
        let TSelectElem = document.querySelector('#tum')

        function tumanFilter(t) {
            console.log(t)
            TSelectElem.innerHTML = ''
            t.forEach(l => {
                let op = document.createElement('option')
                op.innerText = l.nameuz
                op.setAttribute('value', l.id)
                TSelectElem.append(op)
            })
            $('.selectpicker').selectpicker('refresh');
        }

        tumanFilter([{id: null, nameuz: "Avval viloyatni tanlang"}])
        let tumanlar = {!! $tumans !!};

        document.querySelector('#vils').addEventListener('change', (e) => {
            console.log(e.target.value)
            let ttt = tumanlar.filter(i => i.regions_id == e.target.value)
            // console.log(ttt)
            tumanFilter(ttt)
        })
    </script>

@endsection
