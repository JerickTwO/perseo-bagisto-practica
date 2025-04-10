{!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.before') !!}

<div
    class="flex min-h-[78px] w-full justify-between border border-b border-l-0 border-r-0 border-t-0 px-[60px] max-1180:px-8">
    <!--
        This section will provide categories for the first, second, and third levels. If
        additional levels are required, users can customize them according to their needs.
    -->
    <!-- Left Nagivation Section -->
    <div class="flex items-center gap-x-10 max-[1180px]:gap-x-5">
        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.logo.before') !!}

        <a href="{{ route('shop.home.index') }}" aria-label="@lang('shop::app.components.layouts.header.bagisto')">
            <img src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}" width="131"
                height="29" alt="{{ config('app.name') }}">
        </a>

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.logo.after') !!}

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.category.before') !!}

        <v-desktop-category>
            <div class="flex items-center gap-5">
                <span class="shimmer h-6 w-20 rounded" role="presentation"></span>

                <span class="shimmer h-6 w-20 rounded" role="presentation"></span>

                <span class="shimmer h-6 w-20 rounded" role="presentation"></span>
            </div>
        </v-desktop-category>

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.category.after') !!}
    </div>

    <!-- Right Nagivation Section -->
    <div class="flex items-center gap-x-9 max-[1100px]:gap-x-6 max-lg:gap-x-8">

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.search_bar.before') !!}

        <!-- Search Bar Container -->
        <div class="relative w-full">
            <form action="{{ route('shop.search.index') }}" class="flex max-w-[445px] items-center" role="search">
                <label for="organic-search" class="sr-only">
                    @lang('shop::app.components.layouts.header.search')
                </label>

                <div
                    class="icon-search pointer-events-none absolute top-2.5 flex items-center text-xl ltr:left-3 rtl:right-3">
                </div>

                <input type="text" name="query" value="{{ request('query') }}"
                    class="block w-full rounded-lg border border-transparent bg-zinc-100 px-11 py-3 text-xs font-medium text-gray-900 transition-all hover:border-gray-400 focus:border-gray-400"
                    minlength="{{ core()->getConfigData('catalog.products.search.min_query_length') }}"
                    maxlength="{{ core()->getConfigData('catalog.products.search.max_query_length') }}"
                    placeholder="@lang('shop::app.components.layouts.header.search-text')" aria-label="@lang('shop::app.components.layouts.header.search-text')" aria-required="true" pattern="[^\\]+"
                    required>

                <button type="submit" class="hidden" aria-label="@lang('shop::app.components.layouts.header.submit')">
                </button>

                @if (core()->getConfigData('catalog.products.settings.image_search'))
                    @include('shop::search.images.index')
                @endif
            </form>
        </div>

        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.search_bar.after') !!}

        <!-- Right Navigation Links -->
        <div class="mt-1.5 flex gap-x-8 max-[1100px]:gap-x-6 max-lg:gap-x-8">

            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.compare.before') !!}

            <!-- Compare -->
            @if (core()->getConfigData('catalog.products.settings.compare_option'))
                <a href="{{ route('shop.compare.index') }}" aria-label="@lang('shop::app.components.layouts.header.compare')">
                    <span class="icon-compare inline-block cursor-pointer text-2xl" role="presentation"></span>
                </a>
            @endif

            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.compare.after') !!}

            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.mini_cart.before') !!}

            <!-- Mini cart -->
            @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                @include('shop::checkout.cart.mini-cart')
            @endif

            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.mini_cart.after') !!}

            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile.before') !!}

            <!-- user profile -->
            <x-shop::dropdown
                position="bottom-{{ core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left' }}">
                <x-slot:toggle>
                    <span class="icon-users inline-block cursor-pointer text-2xl" role="button"
                        aria-label="@lang('shop::app.components.layouts.header.profile')" tabindex="0"></span>
                </x-slot>

                <!-- Guest Dropdown -->
                @guest('customer')
                    <x-slot:content>
                        <div class="grid gap-2.5">
                            <p class="font-dmserif text-xl">
                                @lang('shop::app.components.layouts.header.welcome-guest')
                            </p>

                            <p class="text-sm">
                                @lang('shop::app.components.layouts.header.dropdown-text')
                            </p>
                        </div>

                        <p class="mt-3 w-full border border-zinc-200"></p>

                        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.customers_action.before') !!}

                        <div class="mt-6 flex gap-4">
                            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.sign_in_button.before') !!}

                            <a href="{{ route('shop.customer.session.create') }}"
                                class="primary-button m-0 mx-auto block w-max rounded-2xl px-7 text-center text-base max-md:rounded-lg ltr:ml-0 rtl:mr-0">
                                @lang('shop::app.components.layouts.header.sign-in')
                            </a>

                            <a href="{{ route('shop.customers.register.index') }}"
                                class="secondary-button m-0 mx-auto block w-max rounded-2xl border-2 px-7 text-center text-base max-md:rounded-lg max-md:py-3 ltr:ml-0 rtl:mr-0">
                                @lang('shop::app.components.layouts.header.sign-up')
                            </a>

                            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.sign_up_button.after') !!}
                        </div>

                        {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.customers_action.after') !!}
                    </x-slot>
                @endguest

                <!-- Customers Dropdown -->
                @auth('customer')
                    <x-slot:content class="!p-0">
                        <div class="grid gap-2.5 p-5 pb-0">
                            <p class="font-dmserif text-xl">
                                @lang('shop::app.components.layouts.header.welcome')’
                                {{ auth()->guard('customer')->user()->first_name }}
                            </p>

                            <p class="text-sm">
                                @lang('shop::app.components.layouts.header.dropdown-text')
                            </p>
                        </div>

                        <p class="mt-3 w-full border border-zinc-200"></p>

                        <div class="mt-2.5 grid gap-1 pb-2.5">
                            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile_dropdown.links.before') !!}

                            <a class="cursor-pointer px-5 py-2 text-base hover:bg-gray-100"
                                href="{{ route('shop.customers.account.profile.index') }}">
                                @lang('shop::app.components.layouts.header.profile')
                            </a>

                            <a class="cursor-pointer px-5 py-2 text-base hover:bg-gray-100"
                                href="{{ route('shop.customers.account.orders.index') }}">
                                @lang('shop::app.components.layouts.header.orders')
                            </a>

                            @if (core()->getConfigData('customer.settings.wishlist.wishlist_option'))
                                <a class="cursor-pointer px-5 py-2 text-base hover:bg-gray-100"
                                    href="{{ route('shop.customers.account.wishlist.index') }}">
                                    @lang('shop::app.components.layouts.header.wishlist')
                                </a>
                            @endif

                            <!--Customers logout-->
                            @auth('customer')
                                <x-shop::form method="DELETE" action="{{ route('shop.customer.session.destroy') }}"
                                    id="customerLogout" />

                                <a class="cursor-pointer px-5 py-2 text-base hover:bg-gray-100"
                                    href="{{ route('shop.customer.session.destroy') }}"
                                    onclick="event.preventDefault(); document.getElementById('customerLogout').submit();">
                                    @lang('shop::app.components.layouts.header.logout')
                                </a>
                            @endauth

                            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile_dropdown.links.after') !!}
                        </div>
                    </x-slot>
                @endauth
            </x-shop::dropdown>

            {!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.profile.after') !!}
        </div>
    </div>
</div>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-desktop-category-template"
    >
        <div
            class="flex items-center gap-5"
            v-if="isLoading"
        >
            <span class="shimmer h-6 w-20 rounded" role="presentation"></span>
            <span class="shimmer h-6 w-20 rounded" role="presentation"></span>
            <span class="shimmer h-6 w-20 rounded" role="presentation"></span>
        </div>

            <div class="flex items-center" v-else>
                <!-- Primeras 4 categorías -->
                <template v-for="(category, index) in categories">
                    <div
                        v-if="index < 4"
                        class="group relative flex h-[77px] items-center border-b-4 border-transparent hover:border-navyBlue"
                    >
                        <span>
                            <a :href="category.url" class="inline-block px-5 uppercase">
                                @{{ category.name }}
                            </a>
                        </span>

                        <div
                            class="pointer-events-none absolute top-[78px] z-[1] max-h-[580px] w-max max-w-[1260px] translate-y-1 overflow-auto border border-t border-[#F3F3F3] bg-white p-1 opacity-0 shadow transition duration-300 ease-out group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in ltr:-left-9 rtl:-right-9"
                            v-if="category.children.length"
                        >
                            <div class="flex justify-between gap-x-[70px]">
                                <div
                                    class="grid w-full max-w-[150px] flex-auto grid-cols-1 content-start gap-5"
                                    v-for="pairCategoryChildren in pairCategoryChildren(category)"
                                >
                                    <template v-for="secondLevelCategory in pairCategoryChildren">
                                        <p class="font-medium text-navyBlue">
                                            <a :href="secondLevelCategory.url">
                                                @{{ secondLevelCategory.name }}
                                            </a>
                                        </p>

                                        <ul class="grid grid-cols-1 gap-3" v-if="secondLevelCategory.children.length">
                                            <li class="text-sm font-medium text-zinc-500" v-for="thirdLevelCategory in secondLevelCategory.children">
                                                <a :href="thirdLevelCategory.url">
                                                    @{{ thirdLevelCategory.name }}
                                                </a>
                                            </li>
                                        </ul>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
<div
v-if="categories.length > 4"
class="group relative flex h-[77px] items-center border-b-4 border-transparent hover:border-navyBlue"
>
<a
    href="/categorias"
    class="inline-block px-5 uppercase text-current hover:text-navyBlue"
    style="cursor: pointer;"
>
    Más ▾
</a>

<!-- Dropdown de "Más" -->
<div
    class="pointer-events-none absolute top-[78px] z-[1] max-h-[580px] w-max max-w-[1260px] translate-y-1 overflow-auto border border-t border-[#F3F3F3] bg-white py-4 px-5 opacity-0 shadow transition duration-300 ease-out group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in ltr:-left-9 rtl:-right-9"
>
    <div class="grid grid-cols-3 gap-y-3 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <div
            class="group relative flex h-[60px] items-center border-b-4 border-transparent hover:border-navyBlue"
            v-for="category in categories.slice(4)"
        >
            <!-- Categoría de nivel 1 (truncada solo en este dropdown) -->
            <a
                :href="category.url"
                class="block px-2 uppercase text-sm"
                style="display: block; max-width: 130px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"
                :title="category.name"
            >
                @{{ category.name }}
            </a>

            <!-- Subcategorías -->
            <div
                class="pointer-events-none absolute top-[78px] z-[1] max-h-[580px] w-max max-w-[1260px] translate-y-1 overflow-auto border border-t border-[#F3F3F3] bg-white p-1 opacity-0 shadow transition duration-300 ease-out group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in ltr:-left-9 rtl:-right-9"
                v-if="category.children.length"
            >
                <div class="flex justify-between gap-x-[70px]">
                    <div
                        class="grid w-full max-w-[150px] flex-auto grid-cols-1 content-start gap-3"
                        v-for="pairCategoryChildren in pairCategoryChildren(category)"
                    >
                        <template v-for="secondLevelCategory in pairCategoryChildren">
                            <p class="font-medium text-navyBlue" :title="secondLevelCategory.name">
                                <a
                                    :href="secondLevelCategory.url"
                                    class="block px-1 text-sm"
                                    :title="secondLevelCategory.name"
                                >
                                    @{{ secondLevelCategory.name }}
                                </a>
                            </p>

                            <ul class="grid grid-cols-1 gap-3" v-if="secondLevelCategory.children.length">
                                <li class="text-sm font-medium text-zinc-500" v-for="thirdLevelCategory in secondLevelCategory.children">
                                    <a
                                        :href="thirdLevelCategory.url"
                                        class="block px-1 text-sm"
                                        :title="thirdLevelCategory.name"
                                    >
                                        @{{ thirdLevelCategory.name }}
                                    </a>
                                </li>
                            </ul>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

        </div>
    </script>

    <script type="module">
        app.component('v-desktop-category', {
            template: '#v-desktop-category-template',

            data() {
                return {
                    isLoading: true,
                    categories: [],
                };
            },

            mounted() {
                this.get();
            },

            methods: {
                get() {
                    this.$axios
                        .get("{{ route('shop.api.categories.tree') }}")
                        .then((response) => {
                            this.isLoading = false;
                            this.categories = response.data.data;
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                },

                pairCategoryChildren(category) {
                    return category.children.reduce((result, value, index, array) => {
                        if (index % 2 === 0) {
                            result.push(array.slice(index, index + 2));
                        }
                        return result;
                    }, []);
                },
            },
        });
    </script>
@endPushOnce


{!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.after') !!}
