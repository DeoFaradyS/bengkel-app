<div class="flex -space-x-3">
    @foreach ([
        'RN8Lqv5ld1c56x9FyYNIa91k6Ok.jpg',
        'c8Y882VVspCnF2dzSB73DekOxXU.jpg',
        'Og0hjSaCLLyuFrVFdROilPVS7Z0.jpg',
        'j9x7IzMZg9wEFdxTvKesOQuQFGA.jpg',
        'YCmjgEamW58KScELPNcT4gs1nc.jpg'
    ] as $avatar)
        <img 
            src="https://framerusercontent.com/images/{{ $avatar }}"
            class="w-8 h-8 rounded-full border-2 border-black object-cover"
            alt="User"
        />
    @endforeach
</div>