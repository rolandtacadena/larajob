<div class="jobs-filter">
    <form @submit.prevent="searchJob">
        <div class="row">
            <div class="medium-6 columns">
                <input type="text" placeholder="Filter jobs" v-model="searchQuery">
            </div>
            <div class="medium-6 columns">
                <select name="location" id="location">
                    <option>Select Location</option>
                    <option value="">Any</option>
                    <option value="">Remote / Everywhere</option>
                    <option value="">Remote / US</option>
                    <option value="">Local</option>
                </select>
            </div>
        </div>
    </form>
</div>