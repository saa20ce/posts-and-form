<template>
    <div>
        <h1>Последние новости</h1>
        <ul>
            <li v-for="news_item in news" :key="news_item.id">
                <h2>{{ news_item.title }}</h2>
                <p>{{ news_item.content }}</p>
                <small>Дата публикации: {{ formatDate(news_item.publicationDate) }}</small>
            </li>
            <li v-if="news.length === 0">Нет новостей</li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        news: {
            type: Array,
            required: true,
        },
    },
    methods: {
        formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString();
        },
    },
};
</script>
