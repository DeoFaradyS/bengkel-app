<x-layouts.dashboard title="Profile">

    <x-header title="Profile" description="Manage your personal information and account settings" />

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Card Kiri: Photo --}}
        <div class="bg-white rounded-xl border border-default p-6 flex flex-col items-start gap-4">

            {{-- Avatar --}}
            <div class="w-20 h-20 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}"
                        alt="{{ $user->name }}"
                        class="w-full h-full object-cover" />
                @else
                    <span class="text-2xl font-semibold text-blue-700">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </span>
                @endif
            </div>

            {{-- Info --}}
            <div>
                <p class="text-sm font-semibold text-heading">Profile picture</p>
                <p class="text-xs text-body mt-0.5">JPG, GIF or PNG. Max size of 800K</p>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-2">
                <label for="avatar-upload">
                    <x-ui.button as="span" variant="default" size="sm">

                        Upload picture
                    </x-ui.button>
                </label>
                <input id="avatar-upload" type="file" class="hidden" accept="image/*" />

                <x-ui.button variant="outline" size="sm">Delete</x-ui.button>
            </div>

        </div>

        {{-- Card Kanan: Form --}}
        <div class="bg-white rounded-xl border border-default p-6 lg:col-span-2">

            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="flex flex-col gap-5">

                    <x-forms.input name="name" label="Name"
                        :value="old('name', $user->name)" required />

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <x-forms.input name="email" label="Email" type="email"
                            :value="old('email', $user->email)" required />

                        <x-forms.input name="phone_number" label="Phone number"
                            :value="old('phone_number', $user->phone_number)" />
                    </div>

                    <div>
                        <x-ui.button type="submit" variant="default">
                            Save changes
                        </x-ui.button>
                    </div>

                </div>
            </form>

        </div>

    </div>

</x-layouts.dashboard>