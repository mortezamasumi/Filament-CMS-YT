<x-app-layout>
    @section('title', $post->title)
    @section('meta_description', $post->meta_description)
    <main class="lg:pt-16 lg:pb-24 dark:bg-gray-900 pt-8 pb-16 antialiased bg-white">
        <div class=" flex justify-between max-w-screen-xl px-4 mx-auto">
            <article
                class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert w-full max-w-2xl mx-auto">
                <div class="mb-5">
                    <img src="{{ $post->getFirstMediaUrl() }}" class="w-full" />
                </div>
                <div class="mb-5">
                    @foreach ($post->categories as $category)
                        <a href="{{ route('category.show', $category->slug) }}" wire:navigate>
                            <span style="background-color:{{ $category->bg_color }};color: {{ $category->text_color }};"
                                class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                {{ $category->title }}
                            </span>
                        </a>
                    @endforeach
                </div>
                <header class="lg:mb-6 not-format mb-4">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="dark:text-white inline-flex items-center mr-3 text-sm text-gray-900">
                            <img class="w-16 h-16 mr-4 rounded-full" src="{{ $post->user->profile_photo_url }}"
                                alt="Jese Leos">
                            <div>
                                <a href="#" rel="author"
                                    class="dark:text-white text-xl font-bold text-gray-900">{{ $post->user->name }}</a>
                                <p class="dark:text-gray-400 text-base text-gray-500">
                                    <time datetime="{{ $post->created_now }}"
                                        title="{{ \Carbon\Carbon::parse($post->created_at)->format('F jS, Y') }}">
                                        {{ \Carbon\Carbon::parse($post->created_at)->format('F jS, Y') }}
                                    </time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="lg:mb-6 lg:text-4xl dark:text-white mb-4 text-3xl font-extrabold leading-tight text-gray-900">
                        {{ $post->title }}
                    </h1>
                </header>

                {!! tiptap_converter()->asHTML($post->content) !!}
            </article>
        </div>
    </main>
</x-app-layout>
