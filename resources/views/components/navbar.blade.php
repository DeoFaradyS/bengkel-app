@props(['title' => null])

<nav class="bg-neutral-primary h-16 w-full z-20 top-0 start-0 border-b border-default">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">
            {{ $title ?? trim($__env->yieldContent('title')) ?? 'Admin Panel' }}
        </span>
  </div>
</nav>