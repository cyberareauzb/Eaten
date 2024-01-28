@extends('layouts.sitemain')

@section('content')
    <div class="utf_contact_map margin-bottom-70">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d745.8600864387822!2d66.9163467289211!3d39.67532324846776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMznCsDQwJzMzLjAiTiA2NsKwNTQnNTguMSJF!5e0!3m2!1sen!2s!4v1695367240489!5m2!1sen!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="clearfix"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section id="contact" class="margin-bottom-70">
                    <h4><i class="sl sl-icon-phone"></i>
                        @if($lang == 'uz')
                            Murojaat formasi
                        @elseif($lang == 'ru')
                            Форма обрашение
                        @else
                            Contact Form
                        @endif
                    </h4>
                    <form id="contactform">
                        <div class="row">
                            <div class="col-md-12">
                                <input name="name" type="text" placeholder=" @if($lang == 'uz') To'liq ism sharifingiz  @elseif($lang == 'ru') Полная Имя @else Fullname @endif " required="">
                            </div>
                            <div class="col-md-6">
                                <input name="email" type="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-6">
                                <input name="phone" type="email" placeholder="@if($lang == 'uz') Telefon  @elseif($lang == 'ru') Телефон @else Phone @endif" required="">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" cols="40" rows="2" id="comments" placeholder="@if($lang == 'uz') Xabar matni  @elseif($lang == 'ru') Сообшение @else Message @endif"
                                          required=""></textarea>
                            </div>
                        </div>
                        <input type="submit" class="button" id="submit" value="@if($lang == 'uz') Yuborish  @elseif($lang == 'ru') Отправить @else Send @endif">
                    </form>
                </section>
            </div>

            <div class="col-md-4">
                <div class="utf_box_widget margin-bottom-70">
                    <h3><i class="sl sl-icon-map"></i> @if($lang == 'uz') Ofis manzili  @elseif($lang == 'ru') Адресь Офиса @else Office Address @endif </h3>
                    <div class="utf_sidebar_textbox">
                        <ul class="utf_contact_detail">
                            <li><strong>@if($lang == 'uz') Telefon  @elseif($lang == 'ru') Телефон @else Phone @endif: </strong> <span><a href="tel:+998995482849">+ 998 99 548 28 49</a></span></li>
                            <li><strong>E-Mail: </strong> <span><a
                                        href="mailto:info@example.com">info@eaten.uz</a></span></li>
                            <li><strong>@if($lang == 'uz') Manzil  @elseif($lang == 'ru') Адресь @else Address @endif: </strong> <span>
                                    @if($lang == 'uz')
                                        Samarqand sh. Spitamen sh.k 264A
                                    @elseif($lang == 'ru')
                                    г. Самарканд. ул. Спитамен 264А
                                    @else
                                        Samarqand city, Spitamen street 264A
                                    @endif
                                </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
