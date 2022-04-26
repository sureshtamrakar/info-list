<template>
    <main>
        <div class="container p-0">
            <div class="row">
                <div class="col-md-12 ">
                    <ul class="nav nav-tabs justify-content-center">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/">Create</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/list">List</router-link>
                        </li>
                    </ul>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </main>
</template>




<style scoped>
main {
    background: #f5f7fb;
}
</style>