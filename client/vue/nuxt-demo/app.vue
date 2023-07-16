<script setup>
const locales = useLocales();
const locale = useLocale();
const date = useLocaleDate(new Date('2016-10-26'));
</script>

<template>
    <img src="/img/nuxt.png" alt="Discover Nuxt 3" />
    <div>
        <!-- <NuxtWelcome /> -->
        <p>{{ date }}</p>
        <label for="locale-chooser">Preview a different locale</label>
        <select id="locale-chooser" v-model="locale">
            <option v-for="locale of locales" :key="locale" :value="locale">
                {{ locale }}
            </option>
        </select>
    </div>
    <header>
        <nav>
            <ul>
                <li><NuxtLink to="/about">About</NuxtLink></li>
                <li><NuxtLink to="/posts/1">Post 1</NuxtLink></li>
                <li><NuxtLink to="/posts/2">Post 2</NuxtLink></li>
            </ul>
        </nav>
    </header>
    <NuxtPage />
    <img src="/assets/img/nuxt.png" alt="Discover Nuxt 3" />
</template>
