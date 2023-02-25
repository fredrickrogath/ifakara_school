<template>
    <div class="">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md px-6 dark:bg-gray-900 dark:text-gray-200 overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>

<!-- min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 -->