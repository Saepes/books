<template>


<!-- ====== Cards Section Start -->
<section class="pt-20">
   <div class="container mx-auto">
    <!-- <input type="text" name="name" placeholder="Search..." class="w-1/3 py-2 border-b-2 bg-white border-blue-600 outline-none focus:border-yellow-400 mb-5"> -->
            <listBooks :books="books"/>
            <paginate
    v-model="page"
    :page-count="20"
    :page-range="3"
    :margin-pages="2"
    :prev-text="'Prev'"
    :next-text="'Next'"
    :container-class="'pagination'"
    :page-class="'page-item'">
  </paginate>
   </div>
</section>
<!-- ====== Cards Section End -->
</template>

<script>
import listBooks from './ListBooks'
import Paginate from 'vuejs-paginate'
import paginationMixin from '../mixins/pagination.mixin'
export default {
    name: "Index",
    mixins: [paginationMixin],

    data: () => ({
       books: null
    }),

    methods: {
       getBook() {
          axios.get('/api/books')
          .then(res => {
             this.books = res.data.data
          })
       },

       setPage() {
          this.setupPagination(this.books)
       }
    },

   mounted() {
     this.getBook()
    },

   

    components: {
       listBooks,
       Paginate
    }
}
</script>
