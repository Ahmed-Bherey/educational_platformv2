@extends('web.layouts.includes.main')
@section('content')
    <div class="wrraber">
        <section class="technicalSupport mb-3">
            <div class="user mb-3">
                <div class="row justify-content-start align-items-center">
                    <div class="col-1 user_img">
                        <img src="{{ asset('public/web/img/default_user.png') }}" alt="" height="30vh">
                    </div>
                    <div class="col-8 user_answer mb-3">
                        <p>أهلا بك في مركز المساعدة. نرجو منك ترك رسالتك وسنعود إليك خلال الساعات القليلة القادمة.
                            أهلا بك في مركز المساعدة. نرجو منك ترك رسالتك وسنعود إليك خلال الساعات القليلة القادمة.
                            أهلا بك في مركز المساعدة. نرجو منك ترك رسالتك وسنعود إليك خلال الساعات القليلة القادمة.
                        </p>
                    </div>
                </div>
            </div>
            <div class="admin mb-3">
                <div class="row justify-content-end align-items-center admin_content">
                    <div class="col-8 admin_answer mb-3">
                        <p>أهلا بك في مركز المساعدة. نرجو منك ترك رسالتك وسنعود إليك خلال الساعات القليلة القادمة.</p>
                    </div>
                    <div class="col-1 admin_img mb-3">
                        <img src="{{ asset('public/web/title.png') }}" alt="" height="30vh">
                    </div>
                </div>
            </div>
        </section>
        <section class="form_message">
            <div class="attach"><i class="fa-solid fa-paperclip"></i></div>
            <div class="form-floating message_content">
                <input type="text">
            </div>
            <button type="submit" class="send"><i class="fa-solid fa-paper-plane"></i></button>
        </section>
    </div>
@endsection
