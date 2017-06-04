<div class="jobs-filter">
    <form @submit.prevent="searchJob">
        <div class="row">

            <div class="medium-9 columns">
                <input type="search" placeholder="Filter jobs" v-model="searchQuery">
            </div>

            <div class="medium-3 columns">
                <button
                    type="submit"
                    class="button expanded search"
                    :class="searchQuery == '' ? 'is-disabled' : ''">
                        Search
                </button>
            </div>

        </div>
    </form>
</div>