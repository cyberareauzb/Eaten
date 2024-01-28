<style>
    input + p,select + p{
        margin-top: -15px !important;
    }
</style>


<section>
    <div class="utf_add_listing_part_headline_part">
        <h3><i class="sl sl-icon-user"></i> Shaxsiy ma'lumotlar</h3>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.refresh') }}" id="myForm" class="mt-6 space-y-6 row">
        @csrf
        @method('patch')
        <div class="col-md-3">
            <label for="mainimg">
                <div class="utf_submit_section col-md-12 oneimg" style="
                height: 175px;
                background-color: #f5f5f5;
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px dashed gray;
                font-size: 40px;
            ">
                    +
                    <input style="display: none" type="file" name="img" class="dropzone" id="mainimg">
                    
                </div>
                <p>Tizimdagi rasmingizni kiriting</p>
            </label>
        </div>
        <div class="col-md-9">
            <div class="col-md-6">
                <x-input-label for="firstname" :value="__('Ism')"/>
                <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full"
                              :value="old('firstname', $user->firstname)" required autofocus autocomplete="firstname"/>
                <x-input-error class="mt-2" :messages="$errors->get('firstname')"/>
                <p  class="myp">Tizimdagi ismingizni kiriting</p>
            </div>
            <div class="col-md-6">
                <x-input-label for="lastname" :value="__('Familya')"/>
                <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full"
                              :value="old('lastname', $user->lastname)" required autofocus autocomplete="lastname"/>
                <x-input-error class="mt-2" :messages="$errors->get('lastname')"/>
                <p>Tizimdagi familyangizni kiriting</p>
            </div>
            <div class="col-md-12">
                <x-input-label for="login" :value="__('Login')"/>
                <x-text-input id="login" name="login" type="text" class="mt-1 block w-full"
                              :value="old('login', $user->login)" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('login')"/>
                <p>Tizim uchun maxsus login undan tizimga kirishda foydalanasiz</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <x-input-label for="region_id" :value="__('Viloyat')"/>
                <select id="region_id" name="region_id" type="text" class="mt-1 block w-full"
                        value="{{old('region_id', $user->region_id)}}" required autofocus autocomplete="region_id">
                    @foreach($region as $item)
                        @if($item->id == old('region_id', $user->region_id))
                            <option selected value="{{$item->id}}">{{$item->nameuz}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nameuz}}</option>
                        @endif
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('region_id')"/>
                <p>O`zingiz yashayotgan viloyatni tanlang</p>
            </div>
            <div class="col-md-6">
                <x-input-label for="tuman_id" :value="__('Tuman')"/>
                <select id="tuman_id" name="tuman_id" type="text" class="mt-1 block w-full"
                        value="{{old('tuman_id', $user->tuman_id)}}" required autofocus autocomplete="tuman_id">
                    @foreach($tuman as $item)
                        @if($item->id == old('tuman_id', $user->tuman_id))
                            <option selected value="{{$item->id}}">{{$item->nameuz}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nameuz}}</option>
                        @endif
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('tuman_id')"/>
                <p>O`zingiz yashayotgan tumanni tanlang</p>
            </div>


            <div class="col-md-12">
                <x-input-label for="address" :value="__('Manzil')"/>
                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                              :value="old('address', $user->address)" required autofocus autocomplete="address"/>
                <x-input-error class="mt-2" :messages="$errors->get('address')"/>
                <p>O`zingiz yashayotgan joyni yozing</p>
            </div>
            <div class="col-md-6">
                <x-input-label for="phone" :value="__('Telefon')"/>
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                              :value="old('phone', $user->phone)" required autofocus autocomplete="phone"/>
                <x-input-error class="mt-2" :messages="$errors->get('phone')"/>
                <p>Ishlaydigan nomeringizni kiriting</p>
            </div>
            <div class="col-md-6">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                              :value="old('email', $user->email)" required autocomplete="username"/>
                <x-input-error class="mt-2" :messages="$errors->get('email')"/>

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
                
                <p>Emailingizni kiriting</p>
            </div>
            <div class="col-md-6">
                <x-input-label for="passport" :value="__('Passport Seriya va raqami')"/>
                <x-text-input id="passport" name="passport" type="text" class="mt-1 block w-full"
                              :value="old('passport', $user->passport)" required autofocus autocomplete="passport"/>
                <x-input-error class="mt-2" :messages="$errors->get('passport')"/>
                <p>Passportingizni seriya va raqamini kiriting</p>
            </div>
            <div class="col-md-6">
                <x-input-label for="jshshir" :value="__('JShShIR')"/>
                <x-text-input id="jshshir" name="jshshir" type="text" class="mt-1 block w-full"
                              :value="old('jshshir', $user->jshshir)" required autofocus autocomplete="jshshir"/>
                <x-input-error class="mt-2" :messages="$errors->get('jshshir')"/>
                <p>Passportingizni JSHSHIRini kiriting</p>
            </div>
            <div class="col-md-12">
                <x-input-label for="desc" :value="__('Qisqacha ma\'lumot')"/>
                <x-text-input id="desc" name="desc" type="text" class="mt-1 block w-full"
                              :value="old('desc', $user->desc)"
                              required autofocus autocomplete="desc"/>
                <x-input-error class="mt-2" :messages="$errors->get('desc')"/>
                <p>Joyingiz haqida qishqacha ma'lumot kiriting</p>
            </div>
            <div class="utf_submit_section col-md-12 galerr">
                <h4>Galereya</h4>
                <input type="file" name="gallery" class="dropzone" id="galer" style="display: none" multiple>
                <label class="col-md-3" style="
                height: 150px;
                background-color: #f5f5f5;
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px dashed gray;
                font-size: 40px;

                " for="galer">
                    +
                </label>
{{--                <div class="col-md-3" style="--}}
{{--                height: 150px;--}}
{{--                background-color: #f5f5f5;--}}
{{--                border-radius: 20px;--}}
{{--                display: flex;--}}
{{--                align-items: center;--}}
{{--                justify-content: center;--}}
{{--                border: 1px dashed gray;--}}
{{--                font-size: 40px;--}}
{{--                ">--}}
{{--                    +--}}
{{--                </div>--}}
            </div>
            
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button id="btnform">{{ __('Saqlash') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saqlandi.') }}</p>
            @endif
        </div>
    </form>
</section>
<script>
    let galeryImages = []
    let GImg = document.querySelector('#galer')
    GImg.addEventListener('change', () => {
        // console.dir(GImg.files)
        let fd = new FormData();
        for (let i = 0; i < GImg.files.length; i++) {
            fd.append('image', GImg.files[i])
        }
        fetch('https://admin.eaten.uz/api/upload-file', {
            method: 'POST',
            body: fd
        }).then(res => res.json()).then(f => {
            // console.log(f)
            let im = document.createElement('div')
            im.setAttribute('style', `
                background-image: url("${f.data.image}");
                height: 150px;
                background-color: #f5f5f5;
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px dashed gray;
                font-size: 40px;
            `)
            im.classList.add('col-md-3')
            document.querySelector('.galerr').append(im)
            // MImg.value = f.data.image
            galeryImages.push(f.data.image)
            let inp = document.getElementById('galer');
            inp.setAttribute('value', JSON.stringify(galeryImages));
            // console.log(JSON.stringify(galeryImages));
        })
    })
    let Images;
    let IImg = document.querySelector('#mainimg')
    IImg.addEventListener('change', () => {
        // console.dir(IImg.files)
        let fd = new FormData();
        for (let i = 0; i < IImg.files.length; i++) {
            fd.append('image', IImg.files[i])
        }
        fetch('https://admin.eaten.uz/api/upload-file', {
            method: 'POST',
            body: fd
        }).then(res => res.json()).then(f => {
            // console.log(f)
            let im = document.createElement('img')
            im.setAttribute('src', f.data.image)
            im.style.width = '60px'
            im.style.height = '60px'
            document.querySelector('.oneimg').append(im)
            // MImg.value = f.data.image
            Images = f.data.image;
            // console.log(JSON.stringify(galeryImages));
        })
    })


    let addform = document.querySelector('#myForm')
    addform.addEventListener('submit', (e) => {
        e.preventDefault();
        let data = {
            _token: addform._token.value,
            firstname: addform.firstname.value,
            lastname: addform.lastname.value,
            login: addform.login.value,
            region_id: addform.region_id.value,
            gallery: JSON.stringify(galeryImages),
            tuman_id: addform.tuman_id.value,
            address: addform.address.value,
            phone: addform.phone.value,
            jshshir: addform.jshshir.value,
            desc: addform.desc.value,
            passport: addform.passport.value,
            email: addform.email.value,
            img: Images,
        }
        console.log(data);
        fetch('{{ route('profile.refresh') }}', {
            method: 'PATCH',
            headers: {
                "Content-type": 'application/json'
            },
            body: JSON.stringify(data)
        }).then(res => res.json()).then(j => {
            alert(j.status)

        })
    });
    let TSelectElem = document.querySelector('#tuman_id')

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
    let tumanlar = {!! $tuman !!};

    document.querySelector('#region_id').addEventListener('change', (e) => {
        console.log(e.target.value)
        let ttt = tumanlar.filter(i => i.regions_id == e.target.value)
        // console.log(ttt)
        tumanFilter(ttt)
    })
</script>
