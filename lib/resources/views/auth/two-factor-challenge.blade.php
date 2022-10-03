<x-guest-layout>

    <div class="card">
        <div class="card-body login-card-body" x-data="{ recovery: false }">
            <p class="login-box-msg" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your
                authenticator application.') }}
            </p>

            <p class="login-box-msg" x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </p>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <x-jet-validation-errors class="mb-3" />
            <form action="{{ route('two-factor.login') }}" method="post">
                @csrf
                <div class="input-group mb-3" x-show="! recovery">
                    <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                        placeholder="Code" name="code" inputmode="numeric" x-ref="code">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3" x-show="recovery">
                    <input type="text" class="form-control {{ $errors->has('recovery_code') ? 'is-invalid' : '' }}"
                        placeholder="Recovery Code" name="recovery_code" x-ref="recovery_code">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-end mt-2 mb-2">
                            <button type="button" class="btn btn-outline-secondary btn-block" x-show="! recovery"
                                x-on:click="
                                                            recovery = true;
                                                            $nextTick(() => { $refs.recovery_code.focus() })
                                                        ">
                                {{ __('Use a recovery code') }}
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-block" x-show="recovery"
                                x-on:click="
                                                            recovery = false;
                                                            $nextTick(() => { $refs.code.focus() })
                                                        ">
                                {{ __('Use an authentication code') }}
                            </button>
                        </div>
                    </div>
            </form>

        </div>
    </div>
</x-guest-layout>
