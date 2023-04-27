import Vue from 'vue';
import FeedbackForm from './components/FeedbackForm.vue';
import NewsList from './components/NewsList.vue';


new Vue({
    el: '#app',
    components: {
        NewsList,
        FeedbackForm,
    },
});
