<template>
  <div class="flex justify-center">
    <div class="mb-3 xl:w-96">
      <div
        class="input-group relative flex flex-row items-stretch w-full mb-4"
      >
        <input
          type="search"
          class="
            form-control
            relative
            flex
            min-w-0
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700
            focus:bg-white
            focus:border-blue-600
            focus:outline-none
          "
          placeholder="Search"
          aria-label="Search"
          aria-describedby="button-addon2"
          @keyup.enter="searchImage"
          v-model="search_query"
        />

        <button
          class="
            btn
            px-6
            py-2.5
            bg-blue-600
            text-white
            font-medium
            text-xs
            leading-tight
            uppercase
            rounded
            shadow-md
            hover:bg-blue-700 hover:shadow-lg
            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
            active:bg-blue-800 active:shadow-lg
            transition
            duration-150
            ease-in-out
            flex
            items-center
          "
          type="button"
          id="button-addon2"
          @click="searchImage"
          @keyup.enter="searchImage"
        >

          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fas"
            data-icon="search"
            class="w-4"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"
          >
            <path
              fill="currentColor"
              d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"
            ></path>
          </svg>
        </button>
      </div>
    </div>
  </div>

    <p class='pagination items-center'>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-5" @click="goPrevious">Previous</button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="goNext">Next</button>
    </p>

    <!-- results -->
    <div class="bg-white flex justify-center" id="search-results">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-8 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <div class="group relative" v-for="photo in images" v-bind:key="photo.id">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:aspect-none">
                    <a v-bind:href="photo.pageURL" target="_blank"><img v-bind:src="photo.webformatURL" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-fit lg:w-full lg:h-full" /></a>
                </div>
                <p class="text-sm font-medium text-gray-900">Author: {{ photo.user }}</p>
                <p class="text-sm font-medium text-gray-900">Tags: {{ photo.tags }}</p>
            </div>

            <!-- More products... -->
            </div>
        </div>
        </div>
</template>

<script>
export default {
  data: function () {
    return {
        images: [],
        total: 0,
        total_hits: 0,
        page: 1
    };
  },

  mounted() {},

  methods: {
    searchImage: function () {
        axios
            .get('/api/search?page=' + this.page + '&q=' + this.search_query)
            .then((response) => {
                this.images = response.data.hits;
                this.total = response.data.total;
                this.total_hits = response.data.totalHits;
            })
            .catch(function (error) {
                console.log(error);
            });
    },

    goPrevious: function(){
        this.page = this.page==1 ? 1 : --this.page;
        this.searchImage();
    },

    goNext: function(){
        this.page++;
        this.searchImage();
    }
  },
};
</script>