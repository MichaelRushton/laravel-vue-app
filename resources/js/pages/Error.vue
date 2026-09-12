<template>
    <Head>
        <title>{{ status }} - {{ $page.props.app_name }}</title>
    </Head>
    <div class="bg-white text-black antialiased">
        <div
            class="items-top relative flex min-h-screen justify-center bg-white text-black sm:items-center sm:pt-0"
            role="main"
        >
            <div class="mx-auto max-w-xl sm:px-6 lg:px-8">
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                    <h1
                        class="border-r border-gray-400 px-4 text-lg text-black"
                    >
                        {{ status }}
                    </h1>

                    <div class="ml-4 text-lg text-black">
                        There was an error with your request.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";

defineProps({
    status: Number,
});

defineOptions({ layout: false });
</script>
