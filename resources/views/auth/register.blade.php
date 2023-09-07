<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" placeholder="Your Name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            {{-- @if (!$errors->get('email'))
                <p>Tidak Boleh Kosong</p>
                @endif --}}
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" placeholder="yourname@global.infotech.com" class="block mt-1 w-full"
                type="text" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            @if (!$errors->get('email'))
                <p class="syarat">Format Email Harus Sesuai</p>
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" placeholder="Asy1$dS98" class="block mt-1 w-full" type="password"
                name="password" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            @if (!$errors->get('password'))
                <p class="syarat">Password Harus menandung minimal 8 karakter, huruf besar dan kecil, Special Character
                    (&*_/%), dan angka (0-9)</p>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" placeholder="Asy1$dS98" class="block mt-1 w-full" type="password"
                name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- no Hp -->
        <div class="mt-4">
            <x-input-label for="no_hp" :value="__('No HP')" />
            <x-text-input id="no_hp" placeholder="08" class="block mt-1 w-full" type="text" name="no_hp"
                :value="old('no_hp')" autofocus autocomplete="no_hp" />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
            @if (!$errors->get('no_hp'))
                <p class="syarat">No Hp harus diawali dengan 08 dan berisi angka</p>
            @endif
        </div>
        <div class="mt-4">
            {{-- format tahun bulan tanggal// dmy tidak usah ditampilkan --}}
            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tanggal_lahir" placeholder="Umur Minimal 17 Tahun" onfocus="(this.type='date')"
                class="date block mt-1 w-full" type="text" name="tanggal_lahir" :value="old('tanggal_lahir')" autofocus
                autocomplete="tanggal_lahir" />
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            @if (!$errors->get('tanggal_lahir'))
                <p class="syarat">Tanggal lahir harus diisi dengan Umur minimal 17 tahun</p>
            @endif
            {{-- <x-text-input id="no_hp" placeholder="minimal 17 tahun" class="block mt-1 w-full" type="text"
                name="no_hp" :value="old('no_hp')" autofocus autocomplete="no_hp" /> --}}
            {{-- <div>
                <label class="lableCalender">
                    <input id="inputCalender" class="inputCalender" type="date">
                    <button id="calendar_text"> 📅</button>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
    </form>
</x-guest-layout>
<style>
    .lableCalender {
        display: inline-block;
        position: relative;
        line-height: 0;
    }

    .inputCalender {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        border: 0;
        overflow: hidden;
        cursor: pointer;
    }

    .inputCalender::-webkit-calendar-picker-indicator {
        position: absolute;
        top: -150%;
        left: -150%;
        width: 300%;
        height: 300%;
        cursor: pointer;
    }

    .inputCalender:hover+button {
        background-color: silver;
    }

    .syarat {
        font-size: 14px;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var passwordInput = document.getElementById("password_confirmation");
        var passwordConfirmation = document.getElementById("password");

        passwordInput.addEventListener("paste", function(e) {
            e.preventDefault();
        });
        passwordConfirmation.addEventListener("paste", function(e) {
            e.preventDefault();
        });
    });
</script>
