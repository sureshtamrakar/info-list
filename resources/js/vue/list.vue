<template>
    <list-view :items="items"></list-view>
</template>
<script>
import addClientVue from "./addClient"
import ListView from './listView.vue'
export default {
    components: {
        addClientVue,
        ListView,
    },
    data: function () {
        return {
            items: []
        }
    },
    methods: {
        getList() {
            axios.get('api/client')
                .then(response => {
                    this.items = response.data
                })
        }
    },
    created() {
        this.getList();
    }
}
</script>
