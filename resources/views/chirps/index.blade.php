<style>
    #btn{
        background-color: rgb(2, 175, 2);
    }

    @import url("https://fonts.googleapis.com/css?family=Raleway");
         :root {
            --glow-color: hsl(186 100% 69%);
        }
        
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
        
        html,
        body {
            height: 100%;
            width: 100%;
            overflow: hidden;
            justify-content: center;
            align-items: center;
        }
        
        .glowing-btn {
            position: relative;
            color: var(--glow-color);
            cursor: pointer;
            padding: 0.35em 1em;
            border: 0.15em solid var(--glow-color);
            border-radius: 0.45em;
            background: none;
            perspective: 2em;
            font-family: "Raleway", sans-serif;
            font-size: 1em;
            font-weight: 1000;
            letter-spacing: 1em;
            -webkit-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color), 0px 0px 0.5em 0px var(--glow-color);
            -moz-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color), 0px 0px 0.5em 0px var(--glow-color);
            box-shadow: inset 0px 0px 0.5em 0px var(--glow-color), 0px 0px 0.5em 0px var(--glow-color);
            animation: border-flicker 2s linear infinite;
        }
        
        .glowing-txt {
            float: left;
            margin-right: -0.8em;
            -webkit-text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em var(--glow-color);
            -moz-text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em var(--glow-color);
            text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em var(--glow-color);
            animation: text-flicker 3s linear infinite;
        }
        
        .faulty-letter {
            opacity: 0.5;
            animation: faulty-flicker 2s linear infinite;
        }
        
        .glowing-btn::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0.7;
            filter: blur(1em);
            transform: translateY(120%) rotateX(95deg) scale(1, 0.35);
            background: var(--glow-color);
            pointer-events: none;
        }
        
        .glowing-btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            z-index: -1;
            background-color: var(--glow-color);
            box-shadow: 0 0 2em 0.2em var(--glow-color);
            transition: opacity 100ms linear;
        }
        
        .glowing-btn:hover {
            color: rgba(0, 0, 0, 0.8);
            text-shadow: none;
            animation: none;
        }
        
        .glowing-btn:hover .glowing-txt {
            animation: none;
        }
        
        .glowing-btn:hover .faulty-letter {
            animation: none;
            text-shadow: none;
            opacity: 1;
        }
        
        .glowing-btn:hover:before {
            filter: blur(1.5em);
            opacity: 1;
        }
        
        .glowing-btn:hover:after {
            opacity: 1;
        }
        
        @keyframes faulty-flicker {
            0% {
                opacity: 0.1;
            }
            2% {
                opacity: 0.1;
            }
            4% {
                opacity: 0.5;
            }
            19% {
                opacity: 0.5;
            }
            21% {
                opacity: 0.1;
            }
            23% {
                opacity: 1;
            }
            80% {
                opacity: 0.5;
            }
            83% {
                opacity: 0.4;
            }
            87% {
                opacity: 1;
            }
        }
        
        @keyframes text-flicker {
            0% {
                opacity: 0.1;
            }
            2% {
                opacity: 1;
            }
            8% {
                opacity: 0.1;
            }
            9% {
                opacity: 1;
            }
            12% {
                opacity: 0.1;
            }
            20% {
                opacity: 1;
            }
            25% {
                opacity: 0.3;
            }
            30% {
                opacity: 1;
            }
            70% {
                opacity: 0.7;
            }
            72% {
                opacity: 0.2;
            }
            77% {
                opacity: 0.9;
            }
            100% {
                opacity: 0.9;
            }
        }
        
        @keyframes border-flicker {
            0% {
                opacity: 0.1;
            }
            2% {
                opacity: 1;
            }
            4% {
                opacity: 0.1;
            }
            8% {
                opacity: 1;
            }
            70% {
                opacity: 0.7;
            }
            100% {
                opacity: 1;
            }
        }
        
        @media only screen and (max-width: 600px) {
            .glowing-btn {
                font-size: 1em;
            }
        }
</style>

<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('chirps.store') }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            
            <br>
            <button style="background-color: rgb(0, 0, 0)" class='glowing-btn' data-bs-toggle="modal" data-bs-target="#exampleModal"><span class='glowing-txt'>C<span class='faulty-letter'>H</span>IRP</span></button>
            <br>
            <br>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($chirps as $chirp)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $chirp->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                            @unless ($chirp->created_at->eq($chirp->updated_at))
                                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                            @endunless
                            </div>
                            @if ($chirp->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link style="display:flex;" :href="route('chirps.edit', $chirp)">
                                        <img style="width: 15px; height: 15px;" src="/images/edit.png" alt="">
                                        <div style="padding-left: 6px">{{ __('Edit') }}</div>
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link style="display:flex;" :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <img style="width: 15px; height: 15px;" src="/images/delete.png" alt="">
                                            <div style="padding-left: 6px">{{ __('Delete') }}</div>
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>