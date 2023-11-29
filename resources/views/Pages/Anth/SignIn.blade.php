<x-MasterPage title="Home-Page">
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                            style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                                    </div>

                                    <form method="POST" action="{{ route('LoginVef') }}">
                                        @csrf

                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="email" value="{{old("email")}}" />
                                            <label class="form-label">email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" placeholder="Pass-word" name="password"
                                                class="form-control" />
                                            <label class="form-label">Password</label>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger container" role="alert">
                                                <h4>Errors :</h4>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">Login</button>

                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-MasterPage>
